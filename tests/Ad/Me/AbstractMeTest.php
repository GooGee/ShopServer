<?php

declare(strict_types=1);

namespace Tests\Ad\Me;


use Tests\Ad\Admin\AbstractAdminTest;

abstract class AbstractMeTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Me";
    }

}