<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\CreateOne;


use App\Models\FileInfo;
use Illuminate\Foundation\Auth\User;

class CreateOneFileInfoEvent
{
    public function __construct(public User $user, public FileInfo $item)
    {
    }
}