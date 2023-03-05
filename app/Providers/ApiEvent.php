<?php

declare(strict_types=1);

namespace App\Providers;

use App\Api\Address\CreateOne\CreateOneAddressEvent;
use App\Api\Address\CreateOne\CreateOneAddressListener;
use App\Api\Address\DeleteOne\DeleteOneAddressEvent;
use App\Api\Address\DeleteOne\DeleteOneAddressListener;
use App\Api\Address\UpdateOne\UpdateOneAddressEvent;
use App\Api\Address\UpdateOne\UpdateOneAddressListener;
use App\Api\CartProduct\CreateOne\CreateOneCartProductEvent;
use App\Api\CartProduct\CreateOne\CreateOneCartProductListener;
use App\Api\CartProduct\DeleteMany\DeleteManyCartProductEvent;
use App\Api\CartProduct\DeleteMany\DeleteManyCartProductListener;
use App\Api\CartProduct\DeleteOne\DeleteOneCartProductEvent;
use App\Api\CartProduct\DeleteOne\DeleteOneCartProductListener;
use App\Api\CartProduct\UpdateOne\UpdateOneCartProductEvent;
use App\Api\CartProduct\UpdateOne\UpdateOneCartProductListener;
use App\Api\Order\CreateOne\CreateOneOrderEvent;
use App\Api\Order\CreateOne\CreateOneOrderListener;
use App\Api\Order\UpdateOne\IncreaseUserOrderListener;
use App\Api\Order\UpdateOne\PayOneOrderEvent;
use App\Api\Order\UpdateOne\PayOneOrderListener;
use App\Api\Order\UpdateOne\UpdateOneOrderEvent;
use App\Api\Order\UpdateOne\UpdateOneOrderListener;
use App\Api\Review\CreateOne\CreateOneReviewEvent;
use App\Api\Review\CreateOne\CreateOneReviewListener;
use App\Api\User\CreateOne\CreateOneUserEvent;
use App\Api\User\CreateOne\CreateOneUserListener;

class ApiEvent
{
    const Eventzz = [

        CreateOneAddressEvent::class => [
            CreateOneAddressListener::class,
        ],
        DeleteOneAddressEvent::class => [
            DeleteOneAddressListener::class,
        ],
        UpdateOneAddressEvent::class => [
            UpdateOneAddressListener::class,
        ],


        CreateOneCartProductEvent::class => [
            CreateOneCartProductListener::class,
        ],
        DeleteOneCartProductEvent::class => [
            DeleteOneCartProductListener::class,
        ],
        DeleteManyCartProductEvent::class => [
            DeleteManyCartProductListener::class,
        ],
        UpdateOneCartProductEvent::class => [
            UpdateOneCartProductListener::class,
        ],


        CreateOneOrderEvent::class => [
            CreateOneOrderListener::class,
        ],
        PayOneOrderEvent::class => [
            PayOneOrderListener::class,
            IncreaseUserOrderListener::class,
        ],
        UpdateOneOrderEvent::class => [
            UpdateOneOrderListener::class,
        ],


        CreateOneReviewEvent::class => [
            CreateOneReviewListener::class,
        ],


        CreateOneUserEvent::class => [
            CreateOneUserListener::class,
        ],

    ];
}