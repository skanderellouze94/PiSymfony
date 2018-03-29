<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hopitaux
 *
 * @ORM\Table(name="hopitaux", indexes={@ORM\Index(name="hopitaux_ibfk_1", columns={"id_etab"})})
 * @ORM\Entity
 */
class Hopitaux
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="urgence", type="boolean", nullable=false)
     */
    private $urgence;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cnam", type="boolean", nullable=false)
     */
    private $cnam;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \PidevEsbeBundle\Entity\Etablissements
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Etablissements")
     * @ORM\JoinColumn(name="id_etab", referencedColumnName="id")
     */
    private $idEtab;


}

