<?php

declare(strict_types=1);

namespace Tests\Ad\FileInfo;

use Illuminate\Foundation\Auth\User;

use App\Models\FileInfo;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractFileInfoTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "FileInfo";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return FileInfo
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = FileInfo::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return FileInfo::keyzz();
    }

}