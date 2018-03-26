<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitParapharmacie
 *
 * @ORM\Table(name="produit_parapharmacie")
 * @ORM\Entity
 */
class ProduitParapharmacie
{
    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=50, nullable=false)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255, nullable=false)
     */
    private $categorie;

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
     * Set marque
     *
     * @param string $marque
     *
     * @return ProduitParapharmacie
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return ProduitParapharmacie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set idProduit
     *
     * @param \RdvBundle\Entity\Produits $idProduit
     *
     * @return ProduitParapharmacie
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
