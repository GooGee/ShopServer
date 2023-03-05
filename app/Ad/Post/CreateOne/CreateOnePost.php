<?php

declare(strict_types=1);

namespace App\Ad\Post\CreateOne;

use App\Models\Admin;

use App\Models\Post;
use App\Repository\PostRepository;

class CreateOnePost
{
    public function __construct(private PostRepository $repository)
    {
    }

    function run(Admin  $user,
                 ?int   $adminId,
                 ?int   $userId,
                 int    $reviewId,
                 string $text,
    )
    {
        $item = new Post();

        $item->adminId = $adminId;
        $item->userId = $userId;
        $item->reviewId = $reviewId;
        $item->text = $text;

        $item->save();
        $item->refresh();

        event(new CreateOnePostEvent($user, $item));

        return $item;
    }

}