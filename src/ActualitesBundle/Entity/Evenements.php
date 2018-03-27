<?php

namespace ActualitesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenements
 *
 * @ORM\Table(name="evenements", indexes={@ORM\Index(name="fk_event_cat", columns={"id_categorie"}), @ORM\Index(name="idCreator", columns={"idCreator"})})
 * @ORM\Entity
 */
class Evenements
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="horaire_com", type="string", length=50, nullable=false)
     */
    private $horaireCom;

    /**
     * @var string
     *
     * @ORM\Column(name="horaire_fin", type="string", length=50, nullable=false)
     */
    private $horaireFin;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=500, nullable=false)
     */
    private $image;

    /**
     * @var boolean
     *
     * @ORM\Column(name="archive", type="boolean", nullable=false)
     */
    private $archive;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCreator", referencedColumnName="id")
     * })
     */
    private $idcreator;




    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categorie", referencedColumnName="id_categorie")
     * })
     */
    private $idCategorie;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUser = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idEvent
     *
     * @return integer
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Evenements
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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Evenements
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Evenements
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set horaireCom
     *
     * @param string $horaireCom
     *
     * @return Evenements
     */
    public function setHoraireCom($horaireCom)
    {
        $this->horaireCom = $horaireCom;

        return $this;
    }

    /**
     * Get horaireCom
     *
     * @return string
     */
    public function getHoraireCom()
    {
        return $this->horaireCom;
    }

    /**
     * Set horaireFin
     *
     * @param string $horaireFin
     *
     * @return Evenements
     */
    public function setHoraireFin($horaireFin)
    {
        $this->horaireFin = $horaireFin;

        return $this;
    }

    /**
     * Get horaireFin
     *
     * @return string
     */
    public function getHoraireFin()
    {
        return $this->horaireFin;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Evenements
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
     * @return Evenements
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
     * Set archive
     *
     * @param boolean $archive
     *
     * @return Evenements
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * Get archive
     *
     * @return boolean
     */
    public function getArchive()
    {
        return $this->archive;
    }

    /**
     * Set idcreator
     *
     * @param \PidevEsbeBundle\Entity\FosUser $idcreator
     *
     * @return Evenements
     */
    public function setIdcreator(\PidevEsbeBundle\Entity\FosUser $idcreator = null)
    {
        $this->idcreator = $idcreator;

        return $this;
    }

    /**
     * Get idcreator
     *
     * @return \PidevEsbeBundle\Entity\FosUser
     */

    public function getIdcreator()
    {
        return $this->idcreator;
    }

    /**
     * Set idCategorie
     *
     * @param \ActualitesBundle\Entity\Categorie $idCategorie
     *
     * @return Evenements
     */

    public function setIdCategorie(\ActualitesBundle\Entity\Categorie $idCategorie = null)
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    /**
     * Get idCategorie
     *
     * @return \ActualitesBundle\Entity\Categorie
     */

    public function getIdCategorie()
    {
        return $this->idCategorie;
    }



}
