<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitHerbo
 *
 * @ORM\Table(name="produit_herbo")
 * @ORM\Entity
 */
class ProduitHerbo
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="bio", type="boolean", nullable=false)
     */
    private $bio;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=20, nullable=false)
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
     * Set bio
     *
     * @param boolean $bio
     *
     * @return ProduitHerbo
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return boolean
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return ProduitHerbo
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
     * @return ProduitHerbo
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
     * @return ProduitHerbo
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
