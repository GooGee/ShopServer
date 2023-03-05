<?php

declare(strict_types=1);

namespace App\Api\Review\CreateOne;

use App\Models\User;

use App\Models\Review;

class CreateOneReview
{
    public function __construct()
    {
    }

    function __invoke(User   $user,

                      string $text,
                      int    $productId,
                      int    $rating,
                      int    $soi,
    )
    {
        $item = new Review();
        $item->userId = $user->id;

        $item->text = $text;
        $item->productId = $productId;
        $item->rating = $rating;
        $item->soi = $soi;

        $item->save();
        $item->refresh();

        event(new CreateOneReviewEvent($user, $item));

        return $item;
    }

}