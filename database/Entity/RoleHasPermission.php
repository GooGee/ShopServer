<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`role_has_permissions`')]
#[ORM\UniqueConstraint(name: "RoleHasPermission_permission_id_role_id_unique", columns: ["permission_id", "role_id"])]
class RoleHasPermission
{


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: '`id`', type: 'integer')]
    private $id;



    #[ORM\ManyToOne(targetEntity: Permission::class)]
    #[ORM\JoinColumn(name: "`permission_id`", referencedColumnName: "id", nullable: false)]
    private $permissions;

    #[ORM\ManyToOne(targetEntity: Role::class)]
    #[ORM\JoinColumn(name: "`role_id`", referencedColumnName: "id", nullable: false)]
    private $roles;


}