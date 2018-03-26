<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="produits", indexes={@ORM\Index(name="id_etab", columns={"id_etab"})})
 * @ORM\Entity
 */
class Produits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduit;

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
     * @var \Etablissements
     *
     * @ORM\ManyToOne(targetEntity="Etablissements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_etab", referencedColumnName="id")
     * })
     */
    private $idEtab;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Commande", inversedBy="idProduit")
     * @ORM\JoinTable(name="detail_commande",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_commande", referencedColumnName="id_commande")
     *   }
     * )
     */
    private $idCommande;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCommande = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idProduit
     *
     * @return integer
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Produits
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produits
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Produits
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Produits
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set idEtab
     *
     * @param \RdvBundle\Entity\Etablissements $idEtab
     *
     * @return Produits
     */
    public function setIdEtab(\RdvBundle\Entity\Etablissements $idEtab = null)
    {
        $this->idEtab = $idEtab;

        return $this;
    }

    /**
     * Get idEtab
     *
     * @return \RdvBundle\Entity\Etablissements
     */
    public function getIdEtab()
    {
        return $this->idEtab;
    }

    /**
     * Add idCommande
     *
     * @param \RdvBundle\Entity\Commande $idCommande
     *
     * @return Produits
     */
    public function addIdCommande(\RdvBundle\Entity\Commande $idCommande)
    {
        $this->idCommande[] = $idCommande;

        return $this;
    }

    /**
     * Remove idCommande
     *
     * @param \RdvBundle\Entity\Commande $idCommande
     */
    public function removeIdCommande(\RdvBundle\Entity\Commande $idCommande)
    {
        $this->idCommande->removeElement($idCommande);
    }

    /**
     * Get idCommande
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }
}
