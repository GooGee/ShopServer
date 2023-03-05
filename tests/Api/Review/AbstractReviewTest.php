<?php

declare(strict_types=1);

namespace Tests\Api\Review;


use App\Models\Review;
use Illuminate\Foundation\Auth\User;
use Tests\API\AbstractApiTest;

abstract class AbstractReviewTest extends AbstractApiTest
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
            ->for($user)
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