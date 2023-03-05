<?php

declare(strict_types=1);

namespace Tests\Ad\Tag;

use Illuminate\Foundation\Auth\User;

use App\Models\Tag;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractTagTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Tag";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Tag
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Tag::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Tag::keyzz();
    }

}