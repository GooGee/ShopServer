<?php

declare(strict_types=1);

namespace App\Ad\Product\UpdateOne;

class UpdateOneProductStockEvent
{
    public function __construct(public \App\Models\Admin $user, public \App\Models\Product $item)
    {
    }
}