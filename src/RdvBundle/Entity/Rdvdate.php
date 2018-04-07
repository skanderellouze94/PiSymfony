<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PidevEsbeBundle\Entity\Services;


/**
 * Rdvdate
 *
 * @ORM\Table(name="rdvdate", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_service", columns={"id_service"})})
 * @ORM\Entity
 */
class Rdvdate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_rdv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRdv;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat = 'Demande';

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datef", type="datetime", nullable=false)
     */
    private $datef;

    /**
     * @var Services
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Services")
     *   @ORM\JoinColumn(name="id_service", referencedColumnName="id")
     * })
     */
    private $idService;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;


    /**
     * Get idRdv
     *
     * @return integer
     */
    public function getIdRdv()
    {
        return $this->idRdv;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Rdvdate
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Rdvdate
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime|DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set datef
     *
     * @param \DateTime $datef
     *
     * @return Rdvdate
     */
    public function setDatef($datef)
    {
        $this->datef = $datef;

        return $this;
    }

    /**
     * Get datef
     *
     * @return \DateTime
     */
    public function getDatef()
    {
        return $this->datef;
    }

    /**
     * Set idService
     *
     * @param \PidevEsbeBundle\Entity\Services $idService
     *
     * @return Rdvdate
     */
    public function setIdService(\PidevEsbeBundle\Entity\Services $idService = null)
    {
        $this->idService = $idService;

        return $this;
    }

    /**
     * Get idService
     *
     * @return \PidevEsbeBundle\Entity\Services
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * Set idUser
     *
     * @param \PidevEsbeBundle\Entity\FosUser $idUser
     *
     * @return Rdvdate
     */
    public function setIdUser(\PidevEsbeBundle\Entity\FosUser $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \PidevEsbeBundle\Entity\FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
