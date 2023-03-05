<?php

declare(strict_types=1);

namespace App\Api\CartProduct\DeleteMany;

use App\Models\User;

use App\Repository\CartProductRepository;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteManyCartProduct
{
    public function __construct(private CartProductRepository $repository)
    {
    }

    /**
     * @param User $user
     * @param array<int> $idzz
     * @return array<int>
     */
    function __invoke(User $user, array $idzz)
    {
        $result = $this->repository->query()
            ->whereIn('id', $idzz)
            ->update(['dtDelete' => now()]);

        event(new DeleteManyCartProductEvent($user, $idzz));

        return $idzz;
    }
}