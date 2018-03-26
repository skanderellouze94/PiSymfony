<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materiels
 *
 * @ORM\Table(name="materiels", indexes={@ORM\Index(name="fk_materiel", columns={"id_salle"})})
 * @ORM\Entity
 */
class Materiels
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_materiel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMateriel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=20, nullable=false)
     */
    private $description;

    /**
     * @var \Etablissements
     *
     * @ORM\ManyToOne(targetEntity="Etablissements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_salle", referencedColumnName="id")
     * })
     */
    private $idSalle;


}

