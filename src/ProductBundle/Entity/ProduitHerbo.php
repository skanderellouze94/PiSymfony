<?php

namespace ProductBundle\Entity;

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
     * @ORM\Column(name="categorie", type="string", nullable=false)
     */
    private $categorie;

    /**
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="ProductBundle\Entity\Produits")
     * @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     */
    private $idProduit;

    /**
     * @return bool
     */
    public function isBio()
    {
        return $this->bio;
    }

    /**
     * @param bool $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param string $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param mixed $idProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }




}

