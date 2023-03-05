<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`model_has_permissions`')]
#[ORM\UniqueConstraint(name: "ModelHasPermission_model_id_model_type_permission_id_unique", columns: ["model_id", "model_type", "permission_id"])]
class ModelHasPermission
{


    #[ORM\Column(name: '`model_type`', type: 'string', length: 111)]
    private $model_type;

    #[ORM\Column(name: '`model_id`', type: 'integer', options: ["unsigned" => true])]
    private $model_id;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: '`id`', type: 'integer')]
    private $id;



    #[ORM\ManyToOne(targetEntity: Permission::class)]
    #[ORM\JoinColumn(name: "`permission_id`", referencedColumnName: "id", nullable: false)]
    private $permissions;


}