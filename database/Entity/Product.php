<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`Product`')]
class Product
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

    #[ORM\Column(name: '`name`', type: 'string', length: 333)]
    private $name;

    #[ORM\Column(name: '`price`', type: 'integer')]
    private $price;

    #[ORM\Column(name: '`stock`', type: 'integer')]
    private $stock;

    #[ORM\Column(name: '`discount`', type: 'integer')]
    private $discount;

    #[ORM\Column(name: '`image`', type: 'string', length: 111)]
    private $image;

    #[ORM\Column(name: '`imagezz`', type: 'string', length: 1222)]
    private $imagezz;

    #[ORM\Column(name: '`aaLiked`', type: 'integer', options: ["default" => "0"])]
    private $aaLiked;

    #[ORM\Column(name: '`aaSold`', type: 'integer', options: ["default" => "0"])]
    private $aaSold;

    #[ORM\Column(name: '`rating`', type: 'float', options: ["default" => "0"])]
    private $rating;

    #[ORM\Column(name: '`ratingzz`', type: 'string', options: ["default" => "[0,0,0,0,0,0]"])]
    private $ratingzz;

    #[ORM\Column(name: '`dtPublish`', type: 'datetime', nullable: true)]
    private $dtPublish;

    #[ORM\Column(name: '`detail`', type: 'text')]
    private $detail;

    #[ORM\Column(name: '`shopId`', type: 'integer')]
    private $shopId;



    #[ORM\ManyToOne(targetEntity: Category::class)]
    #[ORM\JoinColumn(name: "`categoryId`", referencedColumnName: "id", nullable: false)]
    private $category;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductSku::class)]
    private $productSkuzz;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Review::class)]
    private $reviewzz;


}