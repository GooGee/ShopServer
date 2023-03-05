<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`User`')]
#[ORM\UniqueConstraint(name: "User_name_unique", columns: ["name"])]
#[ORM\UniqueConstraint(name: "User_email_unique", columns: ["email"])]
class User
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

    #[ORM\Column(name: '`name`', type: 'string', length: 33)]
    private $name;

    #[ORM\Column(name: '`email`', type: 'string', length: 111)]
    private $email;

    #[ORM\Column(name: '`password`', type: 'string', length: 111)]
    private $password;

    #[ORM\Column(name: '`remember_token`', type: 'string', length: 111, nullable: true)]
    private $remember_token;

    #[ORM\Column(name: '`aaOrder`', type: 'integer', options: ["default" => "0"])]
    private $aaOrder;

    #[ORM\Column(name: '`aaSpend`', type: 'bigint', options: ["default" => "0"])]
    private $aaSpend;



    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Address::class)]
    private $addresszz;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: CartProduct::class)]
    private $cartProductzz;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Order::class)]
    private $orderzz;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Review::class)]
    private $reviewzz;


}