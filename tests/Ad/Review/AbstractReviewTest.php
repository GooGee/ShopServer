<?php

declare(strict_types=1);

namespace Tests\Ad\Review;

use Illuminate\Foundation\Auth\User;

use App\Models\Review;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractReviewTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Review";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Review
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Review::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Review::keyzz();
    }

}