<?php

declare(strict_types=1);

namespace Tests\Ad\Post;

use Illuminate\Foundation\Auth\User;

use App\Models\Post;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractPostTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Post";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Post
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Post::factory()
            ->for($user)
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Post::keyzz();
    }

}