<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="Message", indexes={@ORM\Index(name="fk_reciver_user", columns={"id_reciver"}), @ORM\Index(name="fk_sender_user", columns={"id_sender"})})
 * @ORM\Entity
 */
class Message
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime", nullable=false)
     */
    private $date ;

    /**
     * @var string
     *
     * @ORM\Column(name="msg", type="string", length=2000, nullable=false)
     */
    private $msg;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     *   @ORM\JoinColumn(name="id_reciver", referencedColumnName="id")
     */
    private $idReciver;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     *   @ORM\JoinColumn(name="id_sender", referencedColumnName="id")
     */
    private $idSender;


}

