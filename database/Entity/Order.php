<?php

declare(strict_types=1);

namespace Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('`Order`')]
class Order
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

    #[ORM\Column(name: '`sum`', type: 'bigint')]
    private $sum;

    #[ORM\Column(name: '`dtCancel`', type: 'datetime', nullable: true)]
    private $dtCancel;

    #[ORM\Column(name: '`dtExpire`', type: 'datetime', nullable: true)]
    private $dtExpire;

    #[ORM\Column(name: '`dtFulfill`', type: 'datetime', nullable: true)]
    private $dtFulfill;

    #[ORM\Column(name: '`dtPay`', type: 'datetime', nullable: true)]
    private $dtPay;

    #[ORM\Column(name: '`dtReceive`', type: 'datetime', nullable: true)]
    private $dtReceive;

    #[ORM\Column(name: '`dtRefund`', type: 'datetime', nullable: true)]
    private $dtRefund;

    #[ORM\Column(name: '`dtReturn`', type: 'datetime', nullable: true)]
    private $dtReturn;

    #[ORM\Column(name: '`status`', type: 'string', length: 111)]
    private $status;

    #[ORM\Column(name: '`statusPayment`', type: 'string', length: 111)]
    private $statusPayment;



    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "`userId`", referencedColumnName: "id", nullable: false)]
    private $user;

    #[ORM\OneToMany(mappedBy: 'order', targetEntity: OrderProduct::class)]
    private $orderProductzz;

    #[ORM\ManyToOne(targetEntity: Address::class)]
    #[ORM\JoinColumn(name: "`addressId`", referencedColumnName: "id", nullable: false)]
    private $address;


}