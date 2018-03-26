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
     * @var integer
     *
     * @ORM\Column(name="id_notif", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNotif;

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
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="view", type="boolean", nullable=false)
     */
    private $view;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_receiver", referencedColumnName="id")
     * })
     */
    private $idReceiver;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sender", referencedColumnName="id")
     * })
     */
    private $idSender;

    /**
     * @var \Rdv
     *
     * @ORM\ManyToOne(targetEntity="Rdv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rdv", referencedColumnName="id_rdv")
     * })
     */
    private $idRdv;



    /**
     * Get idNotif
     *
     * @return integer
     */
    public function getIdNotif()
    {
        return $this->idNotif;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Notification
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Notification
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set view
     *
     * @param boolean $view
     *
     * @return Notification
     */
    public function setView($view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Get view
     *
     * @return boolean
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Set idReceiver
     *
     * @param \PidevEsbeBundle\Entity\FosUser $idReceiver
     *
     * @return Notification
     */
    public function setIdReceiver(\PidevEsbeBundle\Entity\FosUser $idReceiver = null)
    {
        $this->idReceiver = $idReceiver;

        return $this;
    }

    /**
     * Get idReceiver
     *
     * @return \PidevEsbeBundle\Entity\FosUser
     */
    public function getIdReceiver()
    {
        return $this->idReceiver;
    }

    /**
     * Set idSender
     *
     * @param \PidevEsbeBundle\Entity\FosUser $idSender
     *
     * @return Notification
     */
    public function setIdSender(\PidevEsbeBundle\Entity\FosUser $idSender = null)
    {
        $this->idSender = $idSender;

        return $this;
    }

    /**
     * Get idSender
     *
     * @return \PidevEsbeBundle\Entity\FosUser
     */
    public function getIdSender()
    {
        return $this->idSender;
    }

    /**
     * Set idRdv
     *
     * @param \PidevEsbeBundle\Entity\Rdv $idRdv
     *
     * @return Notification
     */
    public function setIdRdv(\PidevEsbeBundle\Entity\Rdv $idRdv = null)
    {
        $this->idRdv = $idRdv;

        return $this;
    }

    /**
     * Get idRdv
     *
     * @return \PidevEsbeBundle\Entity\Rdv
     */
    public function getIdRdv()
    {
        return $this->idRdv;
    }
}
