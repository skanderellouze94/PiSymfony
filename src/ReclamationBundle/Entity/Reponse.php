<?php

namespace ReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Reponse
 *
 * @ORM\Table(name="reponse", indexes={@ORM\Index(name="idrec", columns={"idrec"})})
 * @ORM\Entity
 */
class Reponse
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
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     */
    private $message;

    /**
     * @var Reclamation
     *
     * @ORM\ManyToOne(targetEntity="ReclamationBundle\Entity\Reclamation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idrec", referencedColumnName="id_rec")
     * })
     */
    private $idrec;



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
     * @return Reponse
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
     * Set message
     *
     * @param string $message
     *
     * @return Reponse
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set idrec
     *
     * @param Reclamation $idrec
     *
     * @return Reponse
     */
    public function setIdrec( $idrec = null)
    {
        $this->idrec = $idrec;

        return $this;
    }

    /**
     * Get idrec
     *
     * @return ReclamationBundle/Entity/Reclamation
     */
    public function getIdrec()
    {
        return $this->idrec;
    }
}
