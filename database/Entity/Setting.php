<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`Setting`')]
#[ORM\UniqueConstraint(name: "Setting_name_unique", columns: ["name"])]
class Setting
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

    #[ORM\Column(name: '`name`', type: 'string', length: 111)]
    private $name;

    #[ORM\Column(name: '`value`', type: 'string', length: 111)]
    private $value;

    #[ORM\Column(name: '`type`', type: 'string', length: 111)]
    private $type;

    #[ORM\Column(name: '`rac`', type: 'string', length: 111)]
    private $rac;




}