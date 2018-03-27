<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentreBeaute
 *
 * @ORM\Table(name="centre_beaute", indexes={@ORM\Index(name="centre_beaute_ibfk_1", columns={"id_etab"})})
 * @ORM\Entity
 */
class CentreBeaute
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
     * @var integer
     *
     * @ORM\Column(name="nb_employee", type="integer", nullable=false)
     */
    private $nbEmployee;

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

