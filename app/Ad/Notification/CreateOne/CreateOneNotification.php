<?php

declare(strict_types=1);

namespace App\Ad\Notification\CreateOne;

use App\Models\Admin;

use App\Models\Notification;
use App\Repository\NotificationRepository;

class CreateOneNotification
{
    public function __construct(private NotificationRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      string $text,
    )
    {
        $item = new Notification();

        $item->text = $text;

        $item->save();
        $item->refresh();

        event(new CreateOneNotificationEvent($user, $item));

        return $item;
    }

}