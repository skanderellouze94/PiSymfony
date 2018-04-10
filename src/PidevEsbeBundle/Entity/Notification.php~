<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification", indexes={@ORM\Index(name="id_sender", columns={"id_sender", "id_receiver", "id_rdv"}), @ORM\Index(name="id_rdv", columns={"id_rdv"}), @ORM\Index(name="id_receiver", columns={"id_receiver"}), @ORM\Index(name="IDX_BF5476CA7937FF22", columns={"id_sender"})})
 * @ORM\Entity
 */
class Notification
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=5000, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date ;

    /**
     * @var boolean
     *
     * @ORM\Column(name="view", type="boolean", nullable=false)
     */
    private $view = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_notif", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNotif;

    /**
     * @var \PidevEsbeBundle\Entity\Rdv
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Rdv")
     * @ORM\JoinColumn(name="id_rdv", referencedColumnName="id_rdv")
     */
    private $idRdv;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="id_receiver", referencedColumnName="id")
     */
    private $idReceiver;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     *   @ORM\JoinColumn(name="id_sender", referencedColumnName="id")
     */
    private $idSender;


}

