<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\DeleteOne;


use App\Models\FileInfo;
use Illuminate\Foundation\Auth\User;

class DeleteOneFileInfoEvent
{
    public function __construct(public User $user, public FileInfo $item)
    {
    }
}