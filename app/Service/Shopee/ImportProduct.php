<?php

declare(strict_types=1);

namespace App\Service\Shopee;

use App\AbstractBase\AbstractImportFile;
use App\Ad\FileInfo\CreateOne\CreateOneFileInfo;
use App\Ad\Product\CreateOne\CreateOneProductEvent;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductSku;
use App\Repository\AdminRepository;
use App\Repository\CategoryRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ImportProduct extends AbstractImportFile
{
    const File = 'resources/product.json';
    const Uri = 'https://cf.shopee.sg/file/';

    public function __construct(private CategoryRepository $categoryRepository,
                                private AdminRepository    $adminRepository,
                                private CreateOneFileInfo  $createOneFileInfo,
    )
    {
    }

    function getFile(): string
    {
        return self::File;
    }

    function run(Command $command, int $categoryId)
    {
        $result = $this->readJson($command);
        if (is_null($result)) {
            return;
        }

        $itemzz = $result['data']['sections'][0]['data']['item'] ?? null;
        if (is_null($itemzz)) {
            $command->error(self::File . ' does not have any product.');
            return;
        }

        $this->insertAll($itemzz, $command, $categoryId);
        $command->info('OK');
    }

    /**
     * @param array<int, array<string, string>> $datazz
     * @param int $parentId
     * @return void
     */
    function insertAll(array $datazz, Command $command, int $parentId)
    {
        $admin = $this->adminRepository->find(1);
        $map = $this->categoryRepository->getIdParentIdMap();
        $dtUpdate = now();

        Product::unguard();
        foreach ($datazz as $data) {
            $id = $data['itemid'];
            $shopid = $data['shopid'];
            $dtCreate = Carbon::createFromTimestamp($data['ctime']);
            $detail = Product::Detail;
            $name = $data['name'];
            $categoryId = $map->has($data['catid']) ? $data['catid'] : $parentId;
            $discount = intval($data['discount']);
            $price = $data['price'];
            $stock = $data['stock'];
            $dtPublish = $data['stock'] === 0 ? null : $dtUpdate;
            $rating = $data['item_rating']['rating_star'];
            $ratingzz = $data['item_rating']['rating_count'];
            $aaLiked = $data['liked_count'];
            $aaSold = $data['historical_sold'];
            $image = self::Uri . $data['image'];
            $imagezz = array_map(function ($id) {
                return self::Uri . $id;
            }, $data['images']);

            $item = compact(
                'id',
                'shopid',
                'dtCreate',
                'dtUpdate',
                'dtPublish',
                'aaLiked',
                'aaSold',
                'categoryId',
                'detail',
                'discount',
                'image',
                'imagezz',
                'name',
                'price',
                'rating',
                'ratingzz',
                'stock',
            );

            $found = Product::query()->find($id);
            if ($found) {
                $command->info('update ' . $id);
                $found->update($item);
            } else {
                $command->info('create ' . $id);
                $result = Product::query()->create($item);
                $this->insertProductSku($item);
                $this->createOneFileInfo->__invoke($admin, '', 'image/jpeg', $image);
                event(new CreateOneProductEvent($admin, $result));
            }

            $command->info('create Attribute');
            $this->insertAttribute($data['tier_variations'], $categoryId);
        }
        Product::reguard();
    }

    /**
     * @param array<string, string> $data
     * @return void
     */
    function insertProductSku(array $data)
    {
        ProductSku::query()->create([
            'id' => $data['id'],
            'dtCreate' => $data['dtCreate'],
            'dtUpdate' => $data['dtUpdate'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'productId' => $data['id'],
            'variationzz' => [],
        ]);
    }

    /**
     * @param array<int, array<string, mixed>> $datazz
     * @param int $categoryId
     * @return void
     */
    function insertAttribute(array $datazz, int $categoryId)
    {
        $dtCreate = now();
        $dtUpdate = now();
        foreach ($datazz as $data) {
            $name = $data['name'];
            $attribute = Attribute::query()->updateOrCreate(compact('categoryId', 'name'));
            $attributeId = $attribute->id;
            $valuezz = [];
            foreach ($data['options'] as $text) {
                $valuezz[] = compact('dtCreate', 'dtUpdate', 'attributeId', 'text');
            }
            AttributeValue::query()->upsert($valuezz, ['attributeId', 'text']);
        }
    }

    function write(string $text)
    {
        Storage::disk('root')->write(self::File, $text);
    }
}