<?php

declare(strict_types=1);

namespace Tests\Ad\Page;

use Illuminate\Foundation\Auth\User;

use App\Models\Page;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractPageTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Page";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Page
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Page::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Page::keyzz();
    }

}