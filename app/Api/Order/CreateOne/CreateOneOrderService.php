<?php

declare(strict_types=1);

namespace App\Api\Order\CreateOne;

use App\Ad\ProductSku\UpdateOne\UpdateOneProductSku;
use App\Api\CartProduct\DeleteMany\DeleteManyCartProduct;
use App\Api\OrderProduct\CreateOne\CreateOneOrderProduct;
use App\Models\ProductSku;
use App\Models\User;
use App\Repository\AdminRepository;
use App\Repository\CartProductRepository;
use App\Repository\ProductSkuRepository;
use App\Service\PriceService;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CreateOneOrderService
{
    public function __construct(private CreateOneOrder        $createOne,
                                private DeleteManyCartProduct $deleteManyCartProduct,
                                private UpdateOneProductSku   $updateOneProductSku,
                                private AdminRepository       $adminRepository,
                                private CreateOneOrderProduct $createOneOrderProduct,
                                private CartProductRepository $cartProductRepository,
                                private ProductSkuRepository  $productSkuRepository,
    )
    {
    }

    function run(User $user, int $addressId,)
    {
        $item = null;
        DB::transaction(function () use ($user, $addressId, &$item) {
            $itemzz = $this->cartProductRepository->queryOf($user->id)->get();
            if ($itemzz->isEmpty()) {
                throw new BadRequestHttpException('no products in cart.');
            }

            $psic = $itemzz->pluck('productSkuId');
            $psc = $this->productSkuRepository->query()
                ->with('product')
                ->whereIn('id', $psic)
                ->where('stock', '>', 0)
                ->whereNull('dtDelete')
                ->get();
            $psiac = $itemzz->pluck('amount', 'productSkuId');
            $sum = $psc->sum(function ($ps) use ($psiac) {
                /** @var ProductSku $ps */
                return PriceService::calculate($ps->price, $ps->product->discount) * $psiac->get($ps->id);
            });
            $item = $this->createOne->__invoke($user, $sum, $addressId);

            $this->deleteManyCartProduct->__invoke($user, $itemzz->pluck('id')->toArray());

            $admin = $this->adminRepository->getSystemAdmin();
            foreach ($psc as $ps) {
                /** @var ProductSku $ps */
                $this->updateOneProductSku->__invoke($ps->id, $admin, $ps->price, $ps->stock - $psiac->get($ps->id));
                $this->createOneOrderProduct->__invoke(
                    $user,
                    $item->id,
                    $psiac->get($ps->id),
                    PriceService::calculate($ps->price, $ps->product->discount),
                    $ps->id,
                );
            }
        });
        return $item;
    }
}