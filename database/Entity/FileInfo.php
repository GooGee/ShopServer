<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`FileInfo`')]
class FileInfo
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

    #[ORM\Column(name: '`location`', type: 'string', length: 111)]
    private $location;

    #[ORM\Column(name: '`uri`', type: 'string', length: 333)]
    private $uri;

    #[ORM\Column(name: '`mime`', type: 'string', length: 111)]
    private $mime;

    #[ORM\Column(name: '`width`', type: 'integer', options: ["default" => "0"])]
    private $width;

    #[ORM\Column(name: '`height`', type: 'integer', options: ["default" => "0"])]
    private $height;




}