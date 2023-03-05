<?php

declare(strict_types=1);

namespace App\Ad\Tag\CreateMany;

use App\Models\Admin;

use App\Ad\Tag\CreateOne\CreateOneTag;
use App\Repository\TagRepository;

class CreateManyTag
{
    public function __construct(private TagRepository $repository, private CreateOneTag $createOne)
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
            $item = $this->createOne->__invoke($user,

                      $data['name'],);
            $idzz[] = $item->id;
            $itemzz[] = $item;
        }

        event(new CreateManyTagEvent($user, $idzz));

        return $itemzz;
    }

}