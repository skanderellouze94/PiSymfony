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


}

