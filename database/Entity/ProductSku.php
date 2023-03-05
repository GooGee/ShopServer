<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`ProductSku`')]
class ProductSku
{


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: '`id`', type: 'bigint')]
    private $id;

    #[ORM\Column(name: '`dtCreate`', type: 'datetime')]
    private $dtCreate;

    #[ORM\Column(name: '`dtUpdate`', type: 'datetime')]
    private $dtUpdate;

    #[ORM\Column(name: '`dtDelete`', type: 'datetime', nullable: true)]
    private $dtDelete;

    #[ORM\Column(name: '`price`', type: 'integer')]
    private $price;

    #[ORM\Column(name: '`stock`', type: 'integer')]
    private $stock;

    #[ORM\Column(name: '`variationzz`', type: 'string', length: 1222)]
    private $variationzz;



    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "`productId`", referencedColumnName: "id", nullable: false)]
    private $product;


}