<?php

namespace ProductBundle\Entity;

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
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="ProductBundle\Entity\Produits")
     * @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     */
    private $idProduit;


}

