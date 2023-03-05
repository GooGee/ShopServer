<?php

declare(strict_types=1);

namespace App\Ad\Tag\DeleteMany;

use App\Models\Admin;

use App\Repository\TagRepository;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteManyTag
{
    public function __construct(private TagRepository $repository)
    {
    }

    /**
     * @param Admin $user
     * @param array<int> $idzz
     * @return array<int>
     */
    function __invoke(Admin $user, array $idzz)
    {
        $result = $this->repository->query()
            ->whereIn('id', $idzz)
            ->delete();

        event(new DeleteManyTagEvent($user, $idzz));

        return $idzz;
    }
}