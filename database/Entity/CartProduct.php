<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`CartProduct`')]
class CartProduct
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

    #[ORM\Column(name: '`amount`', type: 'integer')]
    private $amount;



    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "`userId`", referencedColumnName: "id", nullable: false)]
    private $user;

    #[ORM\ManyToOne(targetEntity: ProductSku::class)]
    #[ORM\JoinColumn(name: "`productSkuId`", referencedColumnName: "id", nullable: false)]
    private $productSku;


}