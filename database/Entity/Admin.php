<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`Admin`')]
#[ORM\UniqueConstraint(name: "Admin_name_unique", columns: ["name"])]
#[ORM\UniqueConstraint(name: "Admin_email_unique", columns: ["email"])]
class Admin
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

    #[ORM\Column(name: '`dtSuspend`', type: 'datetime', nullable: true)]
    private $dtSuspend;



    #[ORM\OneToMany(mappedBy: 'admin', targetEntity: AdminSession::class)]
    private $adminSessionzz;


}