<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`Voucher`')]
#[ORM\UniqueConstraint(name: "Voucher_code_unique", columns: ["code"])]
class Voucher
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

    #[ORM\Column(name: '`type`', type: 'string', length: 111)]
    private $type;

    #[ORM\Column(name: '`amount`', type: 'integer')]
    private $amount;

    #[ORM\Column(name: '`limit`', type: 'integer')]
    private $limit;

    #[ORM\Column(name: '`code`', type: 'string', length: 111)]
    private $code;

    #[ORM\Column(name: '`dtStart`', type: 'datetime', nullable: true)]
    private $dtStart;

    #[ORM\Column(name: '`dtEnd`', type: 'datetime', nullable: true)]
    private $dtEnd;

    #[ORM\Column(name: '`name`', type: 'string', length: 111)]
    private $name;




}