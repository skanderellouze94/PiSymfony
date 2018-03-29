<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rdv
 *
 * @ORM\Table(name="rdv", indexes={@ORM\Index(name="fk_rdv_owner", columns={"id_user"}), @ORM\Index(name="fk_rdv_service", columns={"id_service"})})
 * @ORM\Entity
 */
class Rdv
{
    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=700, nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=60, nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="time", type="string", length=100, nullable=false)
     */
    private $time;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_rdv", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRdv;

    /**
     * @var \PidevEsbeBundle\Entity\Services
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Services")
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


}

