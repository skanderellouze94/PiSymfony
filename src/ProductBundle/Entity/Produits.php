<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="produits", indexes={@ORM\Index(name="id_etab", columns={"id_etab"})})
 * @ORM\Entity(repositoryClass="ProductBundle\Repository\ProduitsRepository")
 */
class Produits
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=1000, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=3000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=250, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=2000, nullable=false)
     */
    private $image;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_produit", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduit;

    /**
     * @var \EtablissementBundle\Entity\Etablissements
     *
     * @ORM\ManyToOne(targetEntity="EtablissementBundle\Entity\Etablissements")
     * @ORM\JoinColumn(name="id_etab", referencedColumnName="id")
     */
    private $idEtab;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Produits
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return int
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param int $idProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }

    /**
     * @return \PidevEsbeBundle\Entity\Etablissements
     */
    public function getIdEtab()
    {
        return $this->idEtab;
    }

    /**
     * @param \PidevEsbeBundle\Entity\Etablissements $idEtab
     */
    public function setIdEtab($idEtab)
    {
        $this->idEtab = $idEtab;
    }




}

