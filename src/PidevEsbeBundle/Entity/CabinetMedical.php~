<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CabinetMedical
 *
 * @ORM\Table(name="cabinet_medical", indexes={@ORM\Index(name="cabinet_medical_ibfk_1", columns={"id_etab"})})
 * @ORM\Entity
 */
class CabinetMedical
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
     * @var boolean
     *
     * @ORM\Column(name="cnam", type="boolean", nullable=false)
     */
    private $cnam;

    /**
     * @var \Etablissements
     *
     * @ORM\ManyToOne(targetEntity="Etablissements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_etab", referencedColumnName="id")
     * })
     */
    private $idEtab;


}

