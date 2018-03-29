<?php

namespace PidevEsbeBundle\Entity;

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
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Produits")
     * @ORM\JoinColumn(name="id_produit",referencedColumnName="id_produit")
     * @ORM\Id
     */
    private $produit;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Commande")
     * @ORM\JoinColumn(name="id_commande",referencedColumnName="id_commande")
     * @ORM\Id
     */
    private $commande;



    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return DetailCommande
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set produit
     *
     * @param \PidevEsbeBundle\Entity\Produits $produit
     *
     * @return DetailCommande
     */
    public function setProduit(\PidevEsbeBundle\Entity\Produits $produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \PidevEsbeBundle\Entity\Produits
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set commande
     *
     * @param \PidevEsbeBundle\Entity\Commande $commande
     *
     * @return DetailCommande
     */
    public function setCommande(\PidevEsbeBundle\Entity\Commande $commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \PidevEsbeBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }
}
