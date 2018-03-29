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
     * @var integer
     *
     * @ORM\Column(name="id_fiche", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFiche;

    /**
     * @var \PidevEsbeBundle\Entity\Etablissements
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Etablissements")
     * @ORM\JoinColumn(name="idEtab", referencedColumnName="id")
     */
    private $idetab;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="idPatient", referencedColumnName="id")
     */
    private $idpatient;


}

