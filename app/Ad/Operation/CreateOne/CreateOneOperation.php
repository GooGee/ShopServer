<?php

declare(strict_types=1);

namespace App\Ad\Operation\CreateOne;

use App\Models\Admin;

use App\Models\Operation;
use App\Repository\OperationRepository;

class CreateOneOperation
{
    public function __construct(private OperationRepository $repository)
    {
    }

    function __invoke(Admin  $user,
                      string $name,
                      string $text,
    )
    {
        $item = new Operation();
        $item->adminId = $user->id;
        $item->name = $name;
        $item->text = $text;

        $item->save();
        $item->refresh();

        return $item;
    }

}