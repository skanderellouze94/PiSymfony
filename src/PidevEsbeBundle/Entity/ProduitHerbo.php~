<?php

namespace PidevEsbeBundle\Entity;

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


}

