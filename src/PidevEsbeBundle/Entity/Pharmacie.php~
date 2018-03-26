<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pharmacie
 *
 * @ORM\Table(name="pharmacie", indexes={@ORM\Index(name="pharmacie_ibfk_1", columns={"id_etab"})})
 * @ORM\Entity
 */
class Pharmacie
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=500, nullable=false)
     */
    private $type;

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

