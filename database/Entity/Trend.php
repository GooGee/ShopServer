<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`Trend`')]
class Trend
{


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: '`id`', type: 'integer')]
    private $id;

    #[ORM\Column(name: '`dtCreate`', type: 'datetime')]
    private $dtCreate;

    #[ORM\Column(name: '`dtUpdate`', type: 'datetime')]
    private $dtUpdate;

    #[ORM\Column(name: '`dtDelete`', type: 'datetime', nullable: true)]
    private $dtDelete;

    #[ORM\Column(name: '`amount`', type: 'bigint')]
    private $amount;

    #[ORM\Column(name: '`type`', type: 'string', length: 111)]
    private $type;




}