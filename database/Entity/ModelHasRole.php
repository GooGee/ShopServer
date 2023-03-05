<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`model_has_roles`')]
#[ORM\UniqueConstraint(name: "ModelHasRole_model_id_model_type_role_id_unique", columns: ["model_id", "model_type", "role_id"])]
class ModelHasRole
{


    #[ORM\Column(name: '`model_type`', type: 'string', length: 111)]
    private $model_type;

    #[ORM\Column(name: '`model_id`', type: 'integer', options: ["unsigned" => true])]
    private $model_id;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: '`id`', type: 'integer')]
    private $id;



    #[ORM\ManyToOne(targetEntity: Role::class)]
    #[ORM\JoinColumn(name: "`role_id`", referencedColumnName: "id", nullable: false)]
    private $roles;


}