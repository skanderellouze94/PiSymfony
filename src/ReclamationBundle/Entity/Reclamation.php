<?php

namespace ReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use EtablissementBundle\Entity\Etablissements;
use PidevEsbeBundle\Entity\FosUser;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="user", columns={"user"}), @ORM\Index(name="idetab", columns={"idetab"})})
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_rec", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRec;
    /**
     * @var integer
     *
     * @ORM\Column(name="verified", type="integer", length=11, nullable=true)
     */
    private $verified;
    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=255, nullable=false)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var Etablissements
     *
     * @ORM\ManyToOne(targetEntity="EtablissementBundle\Entity\Etablissements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idetab", referencedColumnName="id")
     * })
     */
    private $idetab;

    /**
     * @var FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Get idRec
     *
     * @return integer
     */
    public function getIdRec()
    {
        return $this->idRec;
    }

    /**
     * Set objet
     *
     * @param string $objet
     *
     * @return Reclamation
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Reclamation
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Reclamation
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
     * Set idetab
     *
     * @param Etablissements $idetab
     *
     * @return Reclamation
     */
    public function setIdetab(Etablissements $idetab = null)
    {
        $this->idetab = $idetab;

        return $this;
    }

    /**
     * Get idetab
     *
     * @return \EtablissementBundle\Entity\Etablissements
     */
    public function getIdetab()
    {
        return $this->idetab;
    }

    /**
     * Set user
     *
     * @param FosUser $user
     *
     * @return Reclamation
     */
    public function setUser(FosUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \PidevEsbeBundle\Entity\FosUser
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __toString()
    {
        return ($this->getUser()).(" : ").($this->getObjet());
    }


    /**
     * Set verified
     *
     * @param integer $verified
     *
     * @return Reclamation
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get verified
     *
     * @return integer
     */
    public function getVerified()
    {
        return $this->verified;
    }
}
