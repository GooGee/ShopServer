<?php

declare(strict_types=1);

namespace App\Service\Shopee;

use App\AbstractBase\AbstractImportFile;
use App\Ad\FileInfo\CreateOne\CreateOneFileInfo;
use App\Models\Category;
use App\Repository\AdminRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportCategory extends AbstractImportFile
{
    const File = 'resources/get_category_tree.json';
    const Uri = 'https://cf.shopee.sg/file/';

    static function createRoot()
    {
        $root = [
            'id' => Category::RootId,
            'parentId' => null,
            'name' => 'root',
            'image' => 'https://shopee.sg/favicon.ico',
            'dtCreate' => now(),
            'dtUpdate' => now(),
        ];
        Category::unguard();
        Category::query()->create($root);
        Category::reguard();
    }

    public function __construct(private AdminRepository   $adminRepository,
                                private CreateOneFileInfo $createOneFileInfo,)
    {
    }

    function getFile(): string
    {
        return self::File;
    }

    function run(Command $command)
    {
        $result = $this->readJson($command);
        if (is_null($result)) {
            return;
        }

        $parentzz = $result['data']['category_list'] ?? null;
        if (is_null($parentzz)) {
            $command->error(self::File . ' does not have any category.');
            return;
        }

        $itemzz = [];
        foreach ($parentzz as $parent) {
            $parent['parent_catid'] = Category::RootId;
            $itemzz[] = $parent;
            foreach ($parent['children'] as $child) {
                $itemzz[] = $child;
            }
        }

        $this->insertAll($itemzz);
    }

    function insertAll(array $datazz)
    {
        $admin = $this->adminRepository->find(1);
        $dtCreate = now();
        $dtUpdate = now();

        $categoryzz = [];
        foreach ($datazz as $item) {
            $id = $item['catid'];
            $parentId = $item['parent_catid'];
            $name = $item['name'];
            $image = self::Uri . $item['image'];
            $categoryzz[] = compact('id', 'parentId', 'name', 'image', 'dtCreate', 'dtUpdate');
            $this->createOneFileInfo->__invoke($admin, '', 'image/jpeg', $image);
        }

        self::createRoot();
        if (count($categoryzz)) {
            Category::unguard();
            Category::query()->upsert($categoryzz, 'id');
            Category::reguard();
        }
    }

    function write(string $text)
    {
        Storage::disk('root')->write(self::File, $text);
    }
}