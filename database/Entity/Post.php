<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`Post`')]
class Post
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



    #[ORM\ManyToOne(targetEntity: Review::class)]
    #[ORM\JoinColumn(name: "`reviewId`", referencedColumnName: "id", nullable: false)]
    private $review;

    #[ORM\ManyToOne(targetEntity: Admin::class)]
    #[ORM\JoinColumn(name: "`adminId`", referencedColumnName: "id", nullable: true)]
    private $admin;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "`userId`", referencedColumnName: "id", nullable: true)]
    private $user;


}