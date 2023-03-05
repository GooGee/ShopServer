<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`ProductVoucher`')]
#[ORM\UniqueConstraint(name: "ProductVoucher_productId_voucherId_unique", columns: ["productId", "voucherId"])]
class ProductVoucher
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



    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "`productId`", referencedColumnName: "id", nullable: false)]
    private $product;

    #[ORM\ManyToOne(targetEntity: Voucher::class)]
    #[ORM\JoinColumn(name: "`voucherId`", referencedColumnName: "id", nullable: false)]
    private $voucher;


}