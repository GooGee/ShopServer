<?php

declare(strict_types=1);

namespace Tests\Ad\Notification;

use Illuminate\Foundation\Auth\User;

use App\Models\Notification;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractNotificationTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Notification";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Notification
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Notification::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Notification::keyzz();
    }

}