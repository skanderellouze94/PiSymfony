<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *
 * @ORM\Table(name="services", indexes={@ORM\Index(name="fk_etab_service", columns={"id_etab"})})
 * @ORM\Entity
 */
class Services
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=250, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=2000, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="tarif", type="float", precision=10, scale=0, nullable=false)
     */
    private $tarif;

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


<<<<<<< HEAD
    /**
     * Get idEtab
     *
     * @return \PidevEsbeBundle\Entity\Etablissements
     */
    public function getIdEtab()
    {
        return $this->idEtab;
    }

    public function __toString()
    {
        return $this->getNom();
    }


=======
>>>>>>> fbaf7f05c916b30d5472dc006eb72d9ff341622f
}

