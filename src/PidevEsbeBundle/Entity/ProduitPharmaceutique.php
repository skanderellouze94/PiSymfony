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
     * @ORM\Column(name="mode_administration", type="string", nullable=false)
     */
    private $modeAdministration;

    /**
     * @var string
     *
     * @ORM\Column(name="forme", type="string", nullable=false)
     */
    private $forme;

    /**
     * @var string
     *
     * @ORM\Column(name="PourQui", type="string", nullable=false)
     */
    private $pourqui;

    /**
     * @var \PidevEsbeBundle\Entity\Produits
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="PidevEsbeBundle\Entity\Produits")
     * @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     */
    private $idProduit;


}

