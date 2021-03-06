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
     * @var \Services
     *
     * @ORM\ManyToOne(targetEntity="Services")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_service", referencedColumnName="id")
     * })
     */
    private $idService;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;


}

