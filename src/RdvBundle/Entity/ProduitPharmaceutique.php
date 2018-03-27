<?php

namespace RdvBundle\Entity;

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



    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return ProduitPharmaceutique
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set modeAdministration
     *
     * @param string $modeAdministration
     *
     * @return ProduitPharmaceutique
     */
    public function setModeAdministration($modeAdministration)
    {
        $this->modeAdministration = $modeAdministration;

        return $this;
    }

    /**
     * Get modeAdministration
     *
     * @return string
     */
    public function getModeAdministration()
    {
        return $this->modeAdministration;
    }

    /**
     * Set forme
     *
     * @param string $forme
     *
     * @return ProduitPharmaceutique
     */
    public function setForme($forme)
    {
        $this->forme = $forme;

        return $this;
    }

    /**
     * Get forme
     *
     * @return string
     */
    public function getForme()
    {
        return $this->forme;
    }

    /**
     * Set pourqui
     *
     * @param string $pourqui
     *
     * @return ProduitPharmaceutique
     */
    public function setPourqui($pourqui)
    {
        $this->pourqui = $pourqui;

        return $this;
    }

    /**
     * Get pourqui
     *
     * @return string
     */
    public function getPourqui()
    {
        return $this->pourqui;
    }

    /**
     * Set idProduit
     *
     * @param \RdvBundle\Entity\Produits $idProduit
     *
     * @return ProduitPharmaceutique
     */
    public function setIdProduit(\RdvBundle\Entity\Produits $idProduit)
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    /**
     * Get idProduit
     *
     * @return \RdvBundle\Entity\Produits
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }
}
