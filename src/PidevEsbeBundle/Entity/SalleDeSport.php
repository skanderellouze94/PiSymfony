<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SalleDeSport
 *
 * @ORM\Table(name="salle_de_sport", indexes={@ORM\Index(name="id_etab", columns={"id_etab"})})
 * @ORM\Entity
 */
class SalleDeSport
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nb_entraineur", type="integer", nullable=false)
     */
    private $nbEntraineur;

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

