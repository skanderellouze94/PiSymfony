<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichepatient
 *
 * @ORM\Table(name="fichepatient", indexes={@ORM\Index(name="fk_fiche_owner", columns={"idPatient"}), @ORM\Index(name="fk_fiche_etab", columns={"idEtab"})})
 * @ORM\Entity
 */
class Fichepatient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_fiche", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFiche;

    /**
     * @var string
     *
     * @ORM\Column(name="suivie", type="string", length=3000, nullable=false)
     */
    private $suivie;

    /**
     * @var string
     *
     * @ORM\Column(name="suivieHTML", type="string", length=5000, nullable=false)
     */
    private $suiviehtml;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPatient", referencedColumnName="id")
     * })
     */
    private $idpatient;

    /**
     * @var \Etablissements
     *
     * @ORM\ManyToOne(targetEntity="Etablissements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEtab", referencedColumnName="id")
     * })
     */
    private $idetab;


}

