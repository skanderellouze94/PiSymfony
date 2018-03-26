<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitSalledesport
 *
 * @ORM\Table(name="produit_salledesport")
 * @ORM\Entity
 */
class ProduitSalledesport
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var \Produits
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     * })
     */
    private $idProduit;



    /**
     * Set type
     *
     * @param string $type
     *
     * @return ProduitSalledesport
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set idProduit
     *
     * @param \RdvBundle\Entity\Produits $idProduit
     *
     * @return ProduitSalledesport
     */
    public function setIdProduit(\RdvBundle\Entity\Produits $idProduit)
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    /**
     * Get idProduit
     *
     * @return \RdvBundle\Entity\Produits
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }
}
