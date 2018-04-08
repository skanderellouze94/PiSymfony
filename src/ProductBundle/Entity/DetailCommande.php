<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailCommande
 *
 * @ORM\Table(name="detail_commande", indexes={@ORM\Index(name="fk_prod", columns={"id_produit"}), @ORM\Index(name="fk_com", columns={"id_commande"})})
 * @ORM\Entity
 */
class DetailCommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;


    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="ProductBundle\Entity\Produits")
     * @ORM\JoinColumn(name="id_produit",referencedColumnName="id_produit")
     * @ORM\Id
     */
    private $produit;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="ProductBundle\Entity\Commande")
     * @ORM\JoinColumn(name="id_commande",referencedColumnName="id_commande")
     * @ORM\Id
     */
    private $commande;

    /**
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return int
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param int $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }

    /**
     * @return int
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * @param int $commande
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;
    }

    public static $panier = array();
}

