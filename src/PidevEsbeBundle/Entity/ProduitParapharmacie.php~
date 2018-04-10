<?php

namespace PidevEsbeBundle\Entity;

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
     * @ORM\Column(name="categorie", type="string", nullable=false)
     */
    private $categorie;

    /**
     * @var \PidevEsbeBundle\Entity\Produits
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="PidevEsbeBundle\Entity\Produits")
     * @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     */
    private $idProduit;


}

