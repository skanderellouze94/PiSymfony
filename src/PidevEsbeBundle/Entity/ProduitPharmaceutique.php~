<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitPharmaceutique
 *
 * @ORM\Table(name="produit_pharmaceutique")
 * @ORM\Entity
 */
class ProduitPharmaceutique
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
     * @ORM\Column(name="mode_administration", type="string", length=255, nullable=false)
     */
    private $modeAdministration;

    /**
     * @var string
     *
     * @ORM\Column(name="forme", type="string", length=255, nullable=false)
     */
    private $forme;

    /**
     * @var string
     *
     * @ORM\Column(name="PourQui", type="string", length=255, nullable=false)
     */
    private $pourqui;

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

