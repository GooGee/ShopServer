<?php

declare(strict_types=1);

namespace App\Ad\Setting\UpdateOne;

use App\Models\Admin;

use App\Repository\SettingRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneSetting
{
    public function __construct(private SettingRepository $repository)
    {
    }

    function __invoke(int $id, Admin $user,

                      string $value,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->value = $value;

        $item->save();

        event(new UpdateOneSettingEvent($user, $item));

        return $item;
    }

}