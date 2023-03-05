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

Route::redirect('/', '/admin.html');

Route::prefix('/v1/Api')->middleware(['throttle:m111'])->group(function () {

    Route::get('/Address', \App\Api\Address\ReadMany\ReadManyAddressController::class)->middleware(['auth']);

    Route::delete('/Address/{id}', \App\Api\Address\DeleteOne\DeleteOneAddressController::class)->middleware(['auth']);
    Route::get('/Address/{id}', \App\Api\Address\ReadOne\ReadOneAddressController::class)->middleware(['auth']);
    Route::post('/Address/{id}', \App\Api\Address\CreateOne\CreateOneAddressController::class)->middleware(['auth']);
    Route::put('/Address/{id}', \App\Api\Address\UpdateOne\UpdateOneAddressController::class)->middleware(['auth']);

    Route::get('/AddressPage', \App\Api\Address\ReadPage\ReadPageAddressController::class)->middleware(['auth']);

    Route::delete('/CartProduct', \App\Api\CartProduct\DeleteMany\DeleteManyCartProductController::class)->middleware(['auth']);

    Route::delete('/CartProduct/{id}', \App\Api\CartProduct\DeleteOne\DeleteOneCartProductController::class)->middleware(['auth']);
    Route::get('/CartProduct/{id}', \App\Api\CartProduct\ReadOne\ReadOneCartProductController::class)->middleware(['auth']);
    Route::post('/CartProduct/{id}', \App\Api\CartProduct\CreateOne\CreateOneCartProductController::class)->middleware(['auth']);
    Route::put('/CartProduct/{id}', \App\Api\CartProduct\UpdateOne\UpdateOneCartProductController::class)->middleware(['auth']);

    Route::get('/CartProductPage', \App\Api\CartProduct\ReadPage\ReadPageCartProductController::class)->middleware(['auth']);

    Route::get('/Order/{id}', \App\Api\Order\ReadOne\ReadOneOrderController::class)->middleware(['auth']);
    Route::post('/Order/{id}', \App\Api\Order\CreateOne\CreateOneOrderController::class)->middleware(['auth']);
    Route::put('/Order/{id}', \App\Api\Order\UpdateOne\UpdateOneOrderController::class)->middleware(['auth']);

    Route::get('/OrderPage', \App\Api\Order\ReadPage\ReadPageOrderController::class)->middleware(['auth']);

    Route::get('/OrderProduct', \App\Api\OrderProduct\ReadMany\ReadManyOrderProductController::class)->middleware(['auth']);

    Route::get('/OrderProduct/{id}', \App\Api\OrderProduct\ReadOne\ReadOneOrderProductController::class)->middleware(['auth']);

    Route::post('/Review/{id}', \App\Api\Review\CreateOne\CreateOneReviewController::class)->middleware(['auth']);

    Route::post('/User/{id}', \App\Api\User\CreateOne\CreateOneUserController::class);


});