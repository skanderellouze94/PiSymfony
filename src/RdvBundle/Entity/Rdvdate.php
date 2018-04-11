<?php

namespace RdvBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ProductBundle\Entity\Services;


/**
 * Rdvdate
 *
 * @ORM\Entity
 * @ORM\Table(name="rdvdate")
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
     * @var \ProductBundle\Entity\Services
     *
     * @ORM\ManyToOne(targetEntity="ProductBundle\Entity\Services")
     * @ORM\JoinColumn(name="id_service", referencedColumnName="id")
     */
    private $idService;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
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
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }



    /**
     * @param Services $idService
     */
    public function setIdService($idService)
    {
        $this->idService = $idService;
    }

    /**
     * Get idService
     *
     * @return \ProductBundle\Entity\Services
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
