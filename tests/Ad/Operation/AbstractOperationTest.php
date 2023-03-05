<?php

declare(strict_types=1);

namespace Tests\Ad\Operation;

use Illuminate\Foundation\Auth\User;

use App\Models\Operation;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractOperationTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Operation";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Operation
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Operation::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Operation::keyzz();
    }

}