<?php

declare(strict_types=1);

namespace Tests\Ad\Category;

use Illuminate\Foundation\Auth\User;

use App\Models\Category;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractCategoryTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Category";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Category
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Category::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Category::keyzz();
    }

}