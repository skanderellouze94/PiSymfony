<?php

namespace DemandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_etab", columns={"id_etab"})})
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_demande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=false)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIN", type="integer", nullable=false)
     */
    private $cin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=false)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="CIN_image_recto", type="string", length=500, nullable=false)
     */
    private $cinImageRecto;

    /**
     * @var string
     *
     * @ORM\Column(name="CIN_image_verso", type="string", length=500, nullable=false)
     */
    private $cinImageVerso;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=500, nullable=false)
     */
    private $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_etab", type="string", length=500, nullable=false)
     */
    private $photoEtab;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_identifiant", type="integer", nullable=false)
     */
    private $numIdentifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="patente", type="string", length=500, nullable=false)
     */
    private $patente;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=50, nullable=false)
     */
    private $etat;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="\PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \EtablissementBundle\Entity\Etablissements
     *
     * @ORM\ManyToOne(targetEntity="EtablissementBundle\Entity\Etablissements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_etab", referencedColumnName="id")
     * })
     */
    private $idEtab;












    /**
     * Get idDemande
     *
     * @return integer
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Demande
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Demande
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set cin
     *
     * @param integer $cin
     *
     * @return Demande
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return integer
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Demande
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set cinImageRecto
     *
     * @param string $cinImageRecto
     *
     * @return Demande
     */
    public function setCinImageRecto($cinImageRecto)
    {
        $this->cinImageRecto = $cinImageRecto;

        return $this;
    }

    /**
     * Get cinImageRecto
     *
     * @return string
     */
    public function getCinImageRecto()
    {
        return $this->cinImageRecto;
    }

    /**
     * Set cinImageVerso
     *
     * @param string $cinImageVerso
     *
     * @return Demande
     */
    public function setCinImageVerso($cinImageVerso)
    {
        $this->cinImageVerso = $cinImageVerso;

        return $this;
    }

    /**
     * Get cinImageVerso
     *
     * @return string
     */
    public function getCinImageVerso()
    {
        return $this->cinImageVerso;
    }

    /**
     * Set diplome
     *
     * @param string $diplome
     *
     * @return Demande
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return string
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * Set photoEtab
     *
     * @param string $photoEtab
     *
     * @return Demande
     */
    public function setPhotoEtab($photoEtab)
    {
        $this->photoEtab = $photoEtab;

        return $this;
    }

    /**
     * Get photoEtab
     *
     * @return string
     */
    public function getPhotoEtab()
    {
        return $this->photoEtab;
    }

    /**
     * Set numIdentifiant
     *
     * @param integer $numIdentifiant
     *
     * @return Demande
     */
    public function setNumIdentifiant($numIdentifiant)
    {
        $this->numIdentifiant = $numIdentifiant;

        return $this;
    }

    /**
     * Get numIdentifiant
     *
     * @return integer
     */
    public function getNumIdentifiant()
    {
        return $this->numIdentifiant;
    }

    /**
     * Set patente
     *
     * @param string $patente
     *
     * @return Demande
     */
    public function setPatente($patente)
    {
        $this->patente = $patente;

        return $this;
    }

    /**
     * Get patente
     *
     * @return string
     */
    public function getPatente()
    {
        return $this->patente;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Demande
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set idUser
     *
     * @param \PidevEsbeBundle\Entity\FosUser $idUser
     *
     * @return Demande
     */
    public function setIdUser(\PidevEsbeBundle\Entity\FosUser $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \PidevEsbeBundle\Entity\FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idEtab
     *
     * @param \EtablissementBundle\Entity\Etablissements $idEtab
     *
     * @return Demande
     */
    public function setIdEtab(\EtablissementBundle\Entity\Etablissements $idEtab = null)
    {
        $this->idEtab = $idEtab;

        return $this;
    }

    /**
     * Get idEtab
     *
     * @return \EtablissementBundle\Entity\Etablissements
     */
    public function getIdEtab()
    {
        return $this->idEtab;
    }
}
