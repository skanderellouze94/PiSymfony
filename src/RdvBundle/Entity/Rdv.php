<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PidevEsbeBundle\PidevEsbeBundle;

/**
 * Rdv
 *
 * @ORM\Table(name="rdv")
 * @ORM\Entity
 */
class Rdv
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
     * @ORM\Column(name="date", type="string", length=255, nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=60, nullable=false)
     */
    private $etat = 'Demandé';

    /**
     * @var string
     *
     * @ORM\Column(name="time", type="string", length=255, nullable=true)
     */
    private $time;

    /**
     * @var PidevEsbeBundle/Services
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Services")
     * @ORM\JoinColumn(name="id_service", referencedColumnName="id")
     */
    private $idService;

    /**
     * @var PidevEsbeBundle/FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
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
     * Set date
     *
     * @param string $date
     *
     * @return Rdv
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Rdv
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
     * Set time
     *
     * @param string $time
     *
     * @return Rdv
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set idService
     *
     * @param \RdvBundle\Entity\Services $idService
     *
     * @return Rdv
     */
    public function setIdService(\RdvBundle\Entity\Services $idService = null)
    {
        $this->idService = $idService;

        return $this;
    }

    /**
     * Get idService
     *
     * @return \RdvBundle\Entity\Services
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * Set idUser
     *
     * @param \RdvBundle\Entity\FosUser $idUser
     *
     * @return Rdv
     */
    public function setIdUser(\RdvBundle\Entity\FosUser $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \RdvBundle\Entity\FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
