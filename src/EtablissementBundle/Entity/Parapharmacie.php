<?php

namespace EtablissementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parapharmacie
 *
 * @ORM\Table(name="parapharmacie", indexes={@ORM\Index(name="id_etab", columns={"id_etab"})})
 * @ORM\Entity
 */
class Parapharmacie extends Etablissements
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="livraison", type="boolean", nullable=false)
     */
    private $livraison;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \EtablissementBundle\Entity\Etablissements
     *
     * @ORM\ManyToOne(targetEntity="EtablissementBundle\Entity\Etablissements")
     * @ORM\JoinColumn(name="id_etab", referencedColumnName="id")
     */
    private $idEtab;



    /**
     * Set livraison
     *
     * @param boolean $livraison
     *
     * @return Parapharmacie
     */
    public function setLivraison($livraison)
    {
        $this->livraison = $livraison;

        return $this;
    }

    /**
     * Get livraison
     *
     * @return boolean
     */
    public function getLivraison()
    {
        return $this->livraison;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idEtab
     *
     * @param \EtablissementBundle\Entity\Etablissements $idEtab
     *
     * @return Parapharmacie
     */
    public function setIdEtab(\EtablissementBundle\Entity\Etablissements $idEtab = null)
    {
        $this->idEtab = $idEtab;

        return $this;
    }

    /**
     * Get idEtab
     *
     * @return \EtablissementBundle\Entity\Etablissements
     */
    public function getIdEtab()
    {
        return $this->idEtab;
    }
}
