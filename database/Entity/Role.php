<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`roles`')]
#[ORM\UniqueConstraint(name: "Role_name_guard_name_unique", columns: ["name", "guard_name"])]
class Role
{


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: '`id`', type: 'integer', options: ["unsigned" => true])]
    private $id;

    #[ORM\Column(name: '`name`', type: 'string', length: 111)]
    private $name;

    #[ORM\Column(name: '`guard_name`', type: 'string', length: 111)]
    private $guard_name;

    #[ORM\Column(name: '`dtCreate`', type: 'datetime')]
    private $dtCreate;

    #[ORM\Column(name: '`dtUpdate`', type: 'datetime')]
    private $dtUpdate;

    #[ORM\Column(name: '`dtDelete`', type: 'datetime', nullable: true)]
    private $dtDelete;

    #[ORM\Column(name: '`isUserCreated`', type: 'boolean', options: ["default" => "0"])]
    private $isUserCreated;



    #[ORM\OneToMany(mappedBy: 'roles', targetEntity: ModelHasRole::class)]
    private $modelHasRoleszz;

    #[ORM\OneToMany(mappedBy: 'roles', targetEntity: RoleHasPermission::class)]
    private $roleHasPermissionszz;


}