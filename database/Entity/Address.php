<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`Address`')]
class Address
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

    #[ORM\Column(name: '`zip`', type: 'integer')]
    private $zip;

    #[ORM\Column(name: '`name`', type: 'string', length: 33)]
    private $name;

    #[ORM\Column(name: '`phone`', type: 'string', length: 33)]
    private $phone;

    #[ORM\Column(name: '`text`', type: 'string', length: 333)]
    private $text;



    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(name: "`countryId`", referencedColumnName: "id", nullable: false)]
    private $country;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "`userId`", referencedColumnName: "id", nullable: false)]
    private $user;


}