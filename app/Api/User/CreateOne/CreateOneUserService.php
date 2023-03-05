<?php

declare(strict_types=1);

namespace App\Api\User\CreateOne;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CreateOneUserService
{
    public function __construct(private CreateOneUser $createOneUser)
    {
    }

    function run(array $data)
    {
        $item = null;
        \DB::transaction(function () use (&$data, &$item) {

            $item = $this->createOneUser->__invoke(
                $data['name'],
                $data['email'],
                $data['password'],
            );

        });

        return $item;
    }
}