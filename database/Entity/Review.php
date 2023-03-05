<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`Review`')]
#[ORM\UniqueConstraint(name: "Review_soi_unique", columns: ["soi"])]
class Review
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

    #[ORM\Column(name: '`text`', type: 'string', length: 1222)]
    private $text;

    #[ORM\Column(name: '`rating`', type: 'integer')]
    private $rating;

    #[ORM\Column(name: '`soi`', type: 'bigint')]
    private $soi;



    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "`userId`", referencedColumnName: "id", nullable: false)]
    private $user;

    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "`productId`", referencedColumnName: "id", nullable: false)]
    private $product;


}