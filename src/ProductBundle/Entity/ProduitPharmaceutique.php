<?php

namespace ProductBundle\Entity;

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
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="ProductBundle\Entity\Produits")
     * @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     */
    private $idProduit;

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
    public function getModeAdministration()
    {
        return $this->modeAdministration;
    }

    /**
     * @param string $modeAdministration
     */
    public function setModeAdministration($modeAdministration)
    {
        $this->modeAdministration = $modeAdministration;
    }

    /**
     * @return string
     */
    public function getForme()
    {
        return $this->forme;
    }

    /**
     * @param string $forme
     */
    public function setForme($forme)
    {
        $this->forme = $forme;
    }

    /**
     * @return string
     */
    public function getPourqui()
    {
        return $this->pourqui;
    }

    /**
     * @param string $pourqui
     */
    public function setPourqui($pourqui)
    {
        $this->pourqui = $pourqui;
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

