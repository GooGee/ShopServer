<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/v1/Admin')->middleware(['throttle:m111'])->group(function () {
    Route::post('/AdminSession/{id}', \App\Ad\AdminSession\CreateOne\CreateOneAdminSessionController::class);
});

Route::prefix('/v1/Admin')->middleware(['admin', 'throttle:m111'])->group(function () {

    Route::get('/Address', \App\Ad\Address\ReadMany\ReadManyAddressController::class);

    Route::get('/AddressPage', \App\Ad\Address\ReadPage\ReadPageAddressController::class);

    Route::get('/Admin', \App\Ad\Admin\ReadMany\ReadManyAdminController::class);

    Route::delete('/Admin/{id}', \App\Ad\Admin\DeleteOne\DeleteOneAdminController::class);
    Route::get('/Admin/{id}', \App\Ad\Admin\ReadOne\ReadOneAdminController::class);
    Route::post('/Admin/{id}', \App\Ad\Admin\CreateOne\CreateOneAdminController::class);
    Route::put('/Admin/{id}', \App\Ad\Admin\UpdateOne\UpdateOneAdminController::class);

    Route::get('/AdminPage', \App\Ad\Admin\ReadPage\ReadPageAdminController::class);

    Route::delete('/AdminSession/{id}', \App\Ad\AdminSession\DeleteOne\DeleteOneAdminSessionController::class);

    Route::get('/Attribute', \App\Ad\Attribute\ReadMany\ReadManyAttributeController::class);

    Route::delete('/Attribute/{id}', \App\Ad\Attribute\DeleteOne\DeleteOneAttributeController::class);
    Route::get('/Attribute/{id}', \App\Ad\Attribute\ReadOne\ReadOneAttributeController::class);
    Route::post('/Attribute/{id}', \App\Ad\Attribute\CreateOne\CreateOneAttributeController::class);
    Route::put('/Attribute/{id}', \App\Ad\Attribute\UpdateOne\UpdateOneAttributeController::class);

    Route::get('/AttributePage', \App\Ad\Attribute\ReadPage\ReadPageAttributeController::class);

    Route::delete('/AttributeValue/{id}', \App\Ad\AttributeValue\DeleteOne\DeleteOneAttributeValueController::class);
    Route::get('/AttributeValue/{id}', \App\Ad\AttributeValue\ReadOne\ReadOneAttributeValueController::class);
    Route::post('/AttributeValue/{id}', \App\Ad\AttributeValue\CreateOne\CreateOneAttributeValueController::class);
    Route::put('/AttributeValue/{id}', \App\Ad\AttributeValue\UpdateOne\UpdateOneAttributeValueController::class);

    Route::get('/AttributeValuePage', \App\Ad\AttributeValue\ReadPage\ReadPageAttributeValueController::class);

    Route::get('/Category', \App\Ad\Category\ReadMany\ReadManyCategoryController::class);

    Route::delete('/Category/{id}', \App\Ad\Category\DeleteOne\DeleteOneCategoryController::class);
    Route::get('/Category/{id}', \App\Ad\Category\ReadOne\ReadOneCategoryController::class);
    Route::post('/Category/{id}', \App\Ad\Category\CreateOne\CreateOneCategoryController::class);
    Route::put('/Category/{id}', \App\Ad\Category\UpdateOne\UpdateOneCategoryController::class);

    Route::get('/CategoryPage', \App\Ad\Category\ReadPage\ReadPageCategoryController::class);

    Route::get('/Chart/{id}', \App\Ad\Chart\ReadOne\ReadOneChartController::class);

    Route::get('/Country', \App\Ad\Country\ReadMany\ReadManyCountryController::class);

    Route::delete('/Country/{id}', \App\Ad\Country\DeleteOne\DeleteOneCountryController::class);
    Route::get('/Country/{id}', \App\Ad\Country\ReadOne\ReadOneCountryController::class);
    Route::post('/Country/{id}', \App\Ad\Country\CreateOne\CreateOneCountryController::class);
    Route::put('/Country/{id}', \App\Ad\Country\UpdateOne\UpdateOneCountryController::class);

    Route::get('/CountryPage', \App\Ad\Country\ReadPage\ReadPageCountryController::class);

    Route::delete('/FileInfo/{id}', \App\Ad\FileInfo\DeleteOne\DeleteOneFileInfoController::class);
    Route::get('/FileInfo/{id}', \App\Ad\FileInfo\ReadOne\ReadOneFileInfoController::class);
    Route::post('/FileInfo/{id}', \App\Ad\FileInfo\CreateOne\CreateOneFileInfoController::class);

    Route::get('/FileInfoPage', \App\Ad\FileInfo\ReadPage\ReadPageFileInfoController::class);

    Route::get('/Me/{id}', \App\Ad\Me\ReadOne\ReadOneMeController::class);

    Route::delete('/ModelHasPermission/{id}', \App\Ad\ModelHasPermission\DeleteOne\DeleteOneModelHasPermissionController::class);
    Route::post('/ModelHasPermission/{id}', \App\Ad\ModelHasPermission\CreateOne\CreateOneModelHasPermissionController::class);

    Route::delete('/ModelHasRole/{id}', \App\Ad\ModelHasRole\DeleteOne\DeleteOneModelHasRoleController::class);
    Route::post('/ModelHasRole/{id}', \App\Ad\ModelHasRole\CreateOne\CreateOneModelHasRoleController::class);

    Route::get('/Notification', \App\Ad\Notification\ReadMany\ReadManyNotificationController::class);

    Route::delete('/Notification/{id}', \App\Ad\Notification\DeleteOne\DeleteOneNotificationController::class);
    Route::get('/Notification/{id}', \App\Ad\Notification\ReadOne\ReadOneNotificationController::class);
    Route::post('/Notification/{id}', \App\Ad\Notification\CreateOne\CreateOneNotificationController::class);
    Route::put('/Notification/{id}', \App\Ad\Notification\UpdateOne\UpdateOneNotificationController::class);

    Route::get('/NotificationPage', \App\Ad\Notification\ReadPage\ReadPageNotificationController::class);

    Route::get('/OperationPage', \App\Ad\Operation\ReadPage\ReadPageOperationController::class);

    Route::get('/Order/{id}', \App\Ad\Order\ReadOne\ReadOneOrderController::class);
    Route::put('/Order/{id}', \App\Ad\Order\UpdateOne\UpdateOneOrderController::class);

    Route::get('/OrderPage', \App\Ad\Order\ReadPage\ReadPageOrderController::class);

    Route::get('/OrderProduct', \App\Ad\OrderProduct\ReadMany\ReadManyOrderProductController::class);

    Route::get('/OrderProduct/{id}', \App\Ad\OrderProduct\ReadOne\ReadOneOrderProductController::class);

    Route::get('/OrderProductPage', \App\Ad\OrderProduct\ReadPage\ReadPageOrderProductController::class);

    Route::get('/Page', \App\Ad\Page\ReadMany\ReadManyPageController::class);

    Route::delete('/Page/{id}', \App\Ad\Page\DeleteOne\DeleteOnePageController::class);
    Route::get('/Page/{id}', \App\Ad\Page\ReadOne\ReadOnePageController::class);
    Route::post('/Page/{id}', \App\Ad\Page\CreateOne\CreateOnePageController::class);
    Route::put('/Page/{id}', \App\Ad\Page\UpdateOne\UpdateOnePageController::class);

    Route::get('/PagePage', \App\Ad\Page\ReadPage\ReadPagePageController::class);

    Route::get('/PermissionPage', \App\Ad\Permission\ReadPage\ReadPagePermissionController::class);

    Route::post('/Post/{id}', \App\Ad\Post\CreateOne\CreateOnePostController::class);

    Route::get('/PostPage', \App\Ad\Post\ReadPage\ReadPagePostController::class);

    Route::get('/Product', \App\Ad\Product\ReadMany\ReadManyProductController::class);

    Route::delete('/Product/{id}', \App\Ad\Product\DeleteOne\DeleteOneProductController::class);
    Route::get('/Product/{id}', \App\Ad\Product\ReadOne\ReadOneProductController::class);
    Route::post('/Product/{id}', \App\Ad\Product\CreateOne\CreateOneProductController::class);
    Route::put('/Product/{id}', \App\Ad\Product\UpdateOne\UpdateOneProductController::class);

    Route::get('/ProductPage', \App\Ad\Product\ReadPage\ReadPageProductController::class);

    Route::get('/ProductSku', \App\Ad\ProductSku\ReadMany\ReadManyProductSkuController::class);

    Route::delete('/ProductSku/{id}', \App\Ad\ProductSku\DeleteOne\DeleteOneProductSkuController::class);
    Route::get('/ProductSku/{id}', \App\Ad\ProductSku\ReadOne\ReadOneProductSkuController::class);
    Route::post('/ProductSku/{id}', \App\Ad\ProductSku\CreateOne\CreateOneProductSkuController::class);
    Route::put('/ProductSku/{id}', \App\Ad\ProductSku\UpdateOne\UpdateOneProductSkuController::class);

    Route::get('/ProductSkuPage', \App\Ad\ProductSku\ReadPage\ReadPageProductSkuController::class);

    Route::delete('/ProductVoucher/{id}', \App\Ad\ProductVoucher\DeleteOne\DeleteOneProductVoucherController::class);
    Route::post('/ProductVoucher/{id}', \App\Ad\ProductVoucher\CreateOne\CreateOneProductVoucherController::class);

    Route::get('/ProductVoucherPage', \App\Ad\ProductVoucher\ReadPage\ReadPageProductVoucherController::class);

    Route::get('/Review/{id}', \App\Ad\Review\ReadOne\ReadOneReviewController::class);

    Route::get('/ReviewPage', \App\Ad\Review\ReadPage\ReadPageReviewController::class);

    Route::delete('/Role/{id}', \App\Ad\Role\DeleteOne\DeleteOneRoleController::class);
    Route::get('/Role/{id}', \App\Ad\Role\ReadOne\ReadOneRoleController::class);
    Route::post('/Role/{id}', \App\Ad\Role\CreateOne\CreateOneRoleController::class);
    Route::put('/Role/{id}', \App\Ad\Role\UpdateOne\UpdateOneRoleController::class);

    Route::delete('/RoleHasPermission/{id}', \App\Ad\RoleHasPermission\DeleteOne\DeleteOneRoleHasPermissionController::class);
    Route::post('/RoleHasPermission/{id}', \App\Ad\RoleHasPermission\CreateOne\CreateOneRoleHasPermissionController::class);

    Route::get('/RolePage', \App\Ad\Role\ReadPage\ReadPageRoleController::class);

    Route::get('/Setting/{id}', \App\Ad\Setting\ReadOne\ReadOneSettingController::class);
    Route::put('/Setting/{id}', \App\Ad\Setting\UpdateOne\UpdateOneSettingController::class);

    Route::get('/SettingPage', \App\Ad\Setting\ReadPage\ReadPageSettingController::class);

    Route::delete('/Tag', \App\Ad\Tag\DeleteMany\DeleteManyTagController::class);
    Route::get('/Tag', \App\Ad\Tag\ReadMany\ReadManyTagController::class);
    Route::post('/Tag', \App\Ad\Tag\CreateMany\CreateManyTagController::class);
    Route::put('/Tag', \App\Ad\Tag\UpdateMany\UpdateManyTagController::class);

    Route::delete('/Tag/{id}', \App\Ad\Tag\DeleteOne\DeleteOneTagController::class);
    Route::get('/Tag/{id}', \App\Ad\Tag\ReadOne\ReadOneTagController::class);
    Route::post('/Tag/{id}', \App\Ad\Tag\CreateOne\CreateOneTagController::class);
    Route::put('/Tag/{id}', \App\Ad\Tag\UpdateOne\UpdateOneTagController::class);

    Route::get('/TagPage', \App\Ad\Tag\ReadPage\ReadPageTagController::class);

    Route::get('/TrendPage', \App\Ad\Trend\ReadPage\ReadPageTrendController::class);

    Route::get('/User', \App\Ad\User\ReadMany\ReadManyUserController::class);

    Route::delete('/User/{id}', \App\Ad\User\DeleteOne\DeleteOneUserController::class);
    Route::get('/User/{id}', \App\Ad\User\ReadOne\ReadOneUserController::class);
    Route::put('/User/{id}', \App\Ad\User\UpdateOne\UpdateOneUserController::class);

    Route::get('/UserPage', \App\Ad\User\ReadPage\ReadPageUserController::class);

    Route::get('/Voucher', \App\Ad\Voucher\ReadMany\ReadManyVoucherController::class);

    Route::delete('/Voucher/{id}', \App\Ad\Voucher\DeleteOne\DeleteOneVoucherController::class);
    Route::get('/Voucher/{id}', \App\Ad\Voucher\ReadOne\ReadOneVoucherController::class);
    Route::post('/Voucher/{id}', \App\Ad\Voucher\CreateOne\CreateOneVoucherController::class);
    Route::put('/Voucher/{id}', \App\Ad\Voucher\UpdateOne\UpdateOneVoucherController::class);

    Route::get('/VoucherPage', \App\Ad\Voucher\ReadPage\ReadPageVoucherController::class);


});