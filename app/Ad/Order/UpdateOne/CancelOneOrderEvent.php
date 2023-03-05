<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\Models\AbstractUser;
use App\Models\Order;

class CancelOneOrderEvent
{

    public function __construct(public AbstractUser $user, public Order $item)
    {
    }
}