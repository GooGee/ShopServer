<?php

declare(strict_types=1);

namespace App\Providers;

use App\Ad\Admin\CreateOne\CreateOneAdminEvent;
use App\Ad\Admin\CreateOne\CreateOneAdminListener;
use App\Ad\Admin\UpdateOne\UpdateOneAdminEvent;
use App\Ad\Admin\UpdateOne\UpdateOneAdminListener;
use App\Ad\AdminSession\CreateOne\CreateOneAdminSessionEvent;
use App\Ad\AdminSession\CreateOne\CreateOneAdminSessionListener;
use App\Ad\AdminSession\DeleteOne\DeleteOneAdminSessionEvent;
use App\Ad\AdminSession\DeleteOne\DeleteOneAdminSessionListener;
use App\Ad\Category\CreateOne\CreateOneCategoryEvent;
use App\Ad\Category\CreateOne\CreateOneCategoryListener;
use App\Ad\Category\DeleteOne\DeleteOneCategoryEvent;
use App\Ad\Category\DeleteOne\DeleteOneCategoryListener;
use App\Ad\Category\UpdateOne\UpdateOneCategoryEvent;
use App\Ad\Category\UpdateOne\UpdateOneCategoryListener;
use App\Ad\Country\CreateOne\CreateOneCountryEvent;
use App\Ad\Country\CreateOne\CreateOneCountryListener;
use App\Ad\Country\DeleteOne\DeleteOneCountryEvent;
use App\Ad\Country\DeleteOne\DeleteOneCountryListener;
use App\Ad\Country\UpdateOne\UpdateOneCountryEvent;
use App\Ad\Country\UpdateOne\UpdateOneCountryListener;
use App\Ad\FileInfo\CreateOne\CreateOneFileInfoEvent;
use App\Ad\FileInfo\CreateOne\CreateOneFileInfoListener;
use App\Ad\FileInfo\DeleteOne\DeleteOneFileInfoEvent;
use App\Ad\FileInfo\DeleteOne\DeleteOneFileInfoInDiskListener;
use App\Ad\FileInfo\DeleteOne\DeleteOneFileInfoListener;
use App\Ad\ModelHasPermission\CreateOne\CreateOneModelHasPermissionEvent;
use App\Ad\ModelHasPermission\CreateOne\CreateOneModelHasPermissionListener;
use App\Ad\ModelHasPermission\DeleteOne\DeleteOneModelHasPermissionEvent;
use App\Ad\ModelHasPermission\DeleteOne\DeleteOneModelHasPermissionListener;
use App\Ad\ModelHasRole\CreateOne\CreateOneModelHasRoleEvent;
use App\Ad\ModelHasRole\CreateOne\CreateOneModelHasRoleListener;
use App\Ad\ModelHasRole\DeleteOne\DeleteOneModelHasRoleEvent;
use App\Ad\ModelHasRole\DeleteOne\DeleteOneModelHasRoleListener;
use App\Ad\Order\UpdateOne\CancelOneOrderEvent;
use App\Ad\Order\UpdateOne\CancelOneOrderListener;
use App\Ad\Order\UpdateOne\RefundOneOrderEvent;
use App\Ad\Order\UpdateOne\RefundOneOrderListener;
use App\Ad\Order\UpdateOne\UpdateOneOrderEvent;
use App\Ad\Order\UpdateOne\UpdateOneOrderListener;
use App\Ad\Product\CreateOne\CreateOneProductEvent;
use App\Ad\Product\CreateOne\CreateOneProductListener;
use App\Ad\Product\CreateOne\CreateOneProductToEsListener;
use App\Ad\Product\DeleteOne\DeleteOneProductEvent;
use App\Ad\Product\DeleteOne\DeleteOneProductListener;
use App\Ad\Product\DeleteOne\DeleteOneProductToEsListener;
use App\Ad\Product\UpdateOne\UpdateOneProductEvent;
use App\Ad\Product\UpdateOne\UpdateOneProductListener;
use App\Ad\Product\UpdateOne\UpdateOneProductStockEvent;
use App\Ad\Product\UpdateOne\UpdateOneProductStockListener;
use App\Ad\Product\UpdateOne\UpdateOneProductToEsListener;
use App\Ad\ProductSku\CreateOne\CreateOneProductSkuEvent;
use App\Ad\ProductSku\CreateOne\CreateOneProductSkuListener;
use App\Ad\ProductSku\DeleteOne\DeleteOneProductSkuEvent;
use App\Ad\ProductSku\DeleteOne\DeleteOneProductSkuListener;
use App\Ad\ProductSku\UpdateOne\SetProductStockListener;
use App\Ad\ProductSku\UpdateOne\UpdateOneProductSkuEvent;
use App\Ad\ProductSku\UpdateOne\UpdateOneProductSkuListener;
use App\Ad\Role\CreateOne\CreateOneRoleEvent;
use App\Ad\Role\CreateOne\CreateOneRoleListener;
use App\Ad\Role\DeleteOne\DeleteOneRoleEvent;
use App\Ad\Role\DeleteOne\DeleteOneRoleListener;
use App\Ad\Role\UpdateOne\UpdateOneRoleEvent;
use App\Ad\Role\UpdateOne\UpdateOneRoleListener;
use App\Ad\RoleHasPermission\CreateOne\CreateOneRoleHasPermissionEvent;
use App\Ad\RoleHasPermission\CreateOne\CreateOneRoleHasPermissionListener;
use App\Ad\RoleHasPermission\DeleteOne\DeleteOneRoleHasPermissionEvent;
use App\Ad\RoleHasPermission\DeleteOne\DeleteOneRoleHasPermissionListener;
use App\Ad\Tag\CreateOne\CreateOneTagEvent;
use App\Ad\Tag\CreateOne\CreateOneTagListener;
use App\Ad\Tag\DeleteOne\DeleteOneTagEvent;
use App\Ad\Tag\DeleteOne\DeleteOneTagListener;
use App\Ad\Tag\UpdateOne\UpdateOneTagEvent;
use App\Ad\Tag\UpdateOne\UpdateOneTagListener;
use App\Ad\User\DeleteOne\DeleteOneUserEvent;
use App\Ad\User\DeleteOne\DeleteOneUserListener;
use App\Ad\User\UpdateOne\UpdateOneUserEvent;
use App\Ad\User\UpdateOne\UpdateOneUserListener;
use App\Ad\Voucher\CreateOne\CreateOneVoucherEvent;
use App\Ad\Voucher\CreateOne\CreateOneVoucherListener;
use App\Ad\Voucher\DeleteOne\DeleteOneVoucherEvent;
use App\Ad\Voucher\DeleteOne\DeleteOneVoucherListener;
use App\Ad\Voucher\UpdateOne\UpdateOneVoucherEvent;
use App\Ad\Voucher\UpdateOne\UpdateOneVoucherListener;

class AdminEvent
{
    const Eventzz = [
        CreateOneAdminEvent::class => [
            CreateOneAdminListener::class,
        ],
        UpdateOneAdminEvent::class => [
            UpdateOneAdminListener::class,
        ],

        CreateOneAdminSessionEvent::class => [
            CreateOneAdminSessionListener::class,
        ],
        DeleteOneAdminSessionEvent::class => [
            DeleteOneAdminSessionListener::class,
        ],


        CreateOneCategoryEvent::class => [
            CreateOneCategoryListener::class,
        ],
        DeleteOneCategoryEvent::class => [
            DeleteOneCategoryListener::class,
        ],
        UpdateOneCategoryEvent::class => [
            UpdateOneCategoryListener::class,
        ],


        CreateOneCountryEvent::class => [
            CreateOneCountryListener::class,
        ],
        DeleteOneCountryEvent::class => [
            DeleteOneCountryListener::class,
        ],
        UpdateOneCountryEvent::class => [
            UpdateOneCountryListener::class,
        ],


        CreateOneFileInfoEvent::class => [
            CreateOneFileInfoListener::class,
        ],
        DeleteOneFileInfoEvent::class => [
            DeleteOneFileInfoListener::class,
            DeleteOneFileInfoInDiskListener::class,
        ],


        CreateOneModelHasPermissionEvent::class => [
            CreateOneModelHasPermissionListener::class,
        ],
        DeleteOneModelHasPermissionEvent::class => [
            DeleteOneModelHasPermissionListener::class,
        ],

        CreateOneModelHasRoleEvent::class => [
            CreateOneModelHasRoleListener::class,
        ],
        DeleteOneModelHasRoleEvent::class => [
            DeleteOneModelHasRoleListener::class,
        ],


        CancelOneOrderEvent::class => [
            CancelOneOrderListener::class,
        ],
        RefundOneOrderEvent::class => [
            RefundOneOrderListener::class,
        ],
        UpdateOneOrderEvent::class => [
            UpdateOneOrderListener::class,
        ],


        CreateOneProductEvent::class => [
            CreateOneProductListener::class,
            CreateOneProductToEsListener::class,
        ],
        DeleteOneProductEvent::class => [
            DeleteOneProductListener::class,
            DeleteOneProductToEsListener::class,
        ],
        UpdateOneProductEvent::class => [
            UpdateOneProductListener::class,
            UpdateOneProductToEsListener::class,
        ],
        UpdateOneProductStockEvent::class => [
            UpdateOneProductStockListener::class,
        ],

        CreateOneProductSkuEvent::class => [
            CreateOneProductSkuListener::class,
        ],
        DeleteOneProductSkuEvent::class => [
            DeleteOneProductSkuListener::class,
        ],
        UpdateOneProductSkuEvent::class => [
            UpdateOneProductSkuListener::class,
            SetProductStockListener::class,
        ],


        CreateOneRoleEvent::class => [
            CreateOneRoleListener::class,
        ],
        DeleteOneRoleEvent::class => [
            DeleteOneRoleListener::class,
        ],
        UpdateOneRoleEvent::class => [
            UpdateOneRoleListener::class,
        ],

        CreateOneRoleHasPermissionEvent::class => [
            CreateOneRoleHasPermissionListener::class,
        ],
        DeleteOneRoleHasPermissionEvent::class => [
            DeleteOneRoleHasPermissionListener::class,
        ],


        CreateOneTagEvent::class => [
            CreateOneTagListener::class,
        ],
        DeleteOneTagEvent::class => [
            DeleteOneTagListener::class,
        ],
        UpdateOneTagEvent::class => [
            UpdateOneTagListener::class,
        ],


        DeleteOneUserEvent::class => [
            DeleteOneUserListener::class,
        ],
        UpdateOneUserEvent::class => [
            UpdateOneUserListener::class,
        ],

        CreateOneVoucherEvent::class => [
            CreateOneVoucherListener::class,
        ],
        DeleteOneVoucherEvent::class => [
            DeleteOneVoucherListener::class,
        ],
        UpdateOneVoucherEvent::class => [
            UpdateOneVoucherListener::class,
        ],
    ];
}