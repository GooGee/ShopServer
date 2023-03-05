<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`Attribute`')]
#[ORM\UniqueConstraint(name: "Attribute_categoryId_name_unique", columns: ["categoryId", "name"])]
class Attribute
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



    #[ORM\ManyToOne(targetEntity: Category::class)]
    #[ORM\JoinColumn(name: "`categoryId`", referencedColumnName: "id", nullable: false)]
    private $category;

    #[ORM\OneToMany(mappedBy: 'attribute', targetEntity: AttributeValue::class)]
    private $attributeValuezz;


}