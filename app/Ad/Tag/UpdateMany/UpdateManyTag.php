<?php

declare(strict_types=1);

namespace App\Ad\Tag\UpdateMany;

use App\Models\Admin;

use App\Ad\Tag\UpdateOne\UpdateOneTag;
use App\Repository\TagRepository;

class UpdateManyTag
{
    public function __construct(private TagRepository $repository, private UpdateOneTag $updateOne)
    {
    }

    /**
     * @param Admin $user
     * @param array<int, array> $datazz
     * @return array<int>
     */
    function __invoke(Admin $user, array $datazz)
    {
        $idzz = [];
        $itemzz = [];
        foreach ($datazz as $data) {
            $item = $this->updateOne->__invoke($data['id'], $user,

                      $data['name'],);
            $idzz[] = $item->id;
            $itemzz[] = $item;
        }

        event(new UpdateManyTagEvent($user, $idzz));

        return $itemzz;
    }

}