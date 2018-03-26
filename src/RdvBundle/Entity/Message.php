<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message", indexes={@ORM\Index(name="fk_reciver_user", columns={"id_reciver"}), @ORM\Index(name="fk_sender_user", columns={"id_sender"})})
 * @ORM\Entity
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="msg", type="string", length=2000, nullable=false)
     */
    private $msg;

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
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reciver", referencedColumnName="id")
     * })
     */
    private $idReciver;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Message
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
     * Set msg
     *
     * @param string $msg
     *
     * @return Message
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }

    /**
     * Get msg
     *
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Set idSender
     *
     * @param \RdvBundle\Entity\FosUser $idSender
     *
     * @return Message
     */
    public function setIdSender(\RdvBundle\Entity\FosUser $idSender = null)
    {
        $this->idSender = $idSender;

        return $this;
    }

    /**
     * Get idSender
     *
     * @return \RdvBundle\Entity\FosUser
     */
    public function getIdSender()
    {
        return $this->idSender;
    }

    /**
     * Set idReciver
     *
     * @param \RdvBundle\Entity\FosUser $idReciver
     *
     * @return Message
     */
    public function setIdReciver(\RdvBundle\Entity\FosUser $idReciver = null)
    {
        $this->idReciver = $idReciver;

        return $this;
    }

    /**
     * Get idReciver
     *
     * @return \RdvBundle\Entity\FosUser
     */
    public function getIdReciver()
    {
        return $this->idReciver;
    }
}
