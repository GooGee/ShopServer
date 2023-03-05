<?php
declare(strict_types=1);

namespace App\Api\Order\UpdateOne;

class PayOneOrderEvent
{
    public function __construct(public \App\Models\User $user, public \App\Models\Order $item)
    {
    }
}