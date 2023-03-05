<?php

declare(strict_types=1);

namespace App\Models;

class Order extends OrderBase
{
    const StatusPaymentUnpaid = 'Unpaid';

    const StatusPlaced = 'Placed';
    const StatusCancelled = 'Cancelled';


    const StatusPaymentPayed = 'Payed';

    const StatusFulfilled = 'Fulfilled';
    const StatusReceived = 'Received';
    const StatusReturned = 'Returned';

    const StatusPaymentRefunded = 'Refunded';
}