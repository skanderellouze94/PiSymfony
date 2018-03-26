<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parapharmacie
 *
 * @ORM\Table(name="parapharmacie", indexes={@ORM\Index(name="id_etab", columns={"id_etab"})})
 * @ORM\Entity
 */
class Parapharmacie
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
     * @ORM\Column(name="livraison", type="boolean", nullable=false)
     */
    private $livraison;

    /**
     * @var \Etablissements
     *
     * @ORM\ManyToOne(targetEntity="Etablissements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_etab", referencedColumnName="id")
     * })
     */
    private $idEtab;



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
     * Set idEtab
     *
     * @param \PidevEsbeBundle\Entity\Etablissements $idEtab
     *
     * @return Parapharmacie
     */
    public function setIdEtab(\PidevEsbeBundle\Entity\Etablissements $idEtab = null)
    {
        $this->idEtab = $idEtab;

        return $this;
    }

    /**
     * Get idEtab
     *
     * @return \PidevEsbeBundle\Entity\Etablissements
     */
    public function getIdEtab()
    {
        return $this->idEtab;
    }
}
