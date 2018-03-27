<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidature
 *
 * @ORM\Table(name="candidature", indexes={@ORM\Index(name="fk_candidature_utilisateur", columns={"id_utilisateur"}), @ORM\Index(name="id_annonce", columns={"id_annonce"})})
 * @ORM\Entity
 */
class Candidature
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_postulation", type="date", nullable=false)
     */
    private $datePostulation;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=20, nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau_etude", type="string", length=50, nullable=false)
     */
    private $niveauEtude;

    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=100, nullable=false)
     */
    private $cv;

    /**
     * @var \Annonce
     *
     * @ORM\ManyToOne(targetEntity="Annonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_annonce", referencedColumnName="id")
     * })
     */
    private $idAnnonce;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id")
     * })
     */
    private $idUtilisateur;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datePostulation
     *
     * @param \DateTime $datePostulation
     *
     * @return Candidature
     */
    public function setDatePostulation($datePostulation)
    {
        $this->datePostulation = $datePostulation;

        return $this;
    }

    /**
     * Get datePostulation
     *
     * @return \DateTime
     */
    public function getDatePostulation()
    {
        return $this->datePostulation;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Candidature
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
     * Set niveauEtude
     *
     * @param string $niveauEtude
     *
     * @return Candidature
     */
    public function setNiveauEtude($niveauEtude)
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }

    /**
     * Get niveauEtude
     *
     * @return string
     */
    public function getNiveauEtude()
    {
        return $this->niveauEtude;
    }

    /**
     * Set cv
     *
     * @param string $cv
     *
     * @return Candidature
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set idAnnonce
     *
     * @param \RdvBundle\Entity\Annonce $idAnnonce
     *
     * @return Candidature
     */
    public function setIdAnnonce(\RdvBundle\Entity\Annonce $idAnnonce = null)
    {
        $this->idAnnonce = $idAnnonce;

        return $this;
    }

    /**
     * Get idAnnonce
     *
     * @return \RdvBundle\Entity\Annonce
     */
    public function getIdAnnonce()
    {
        return $this->idAnnonce;
    }

    /**
     * Set idUtilisateur
     *
     * @param \RdvBundle\Entity\FosUser $idUtilisateur
     *
     * @return Candidature
     */
    public function setIdUtilisateur(\RdvBundle\Entity\FosUser $idUtilisateur = null)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get idUtilisateur
     *
     * @return \RdvBundle\Entity\FosUser
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }
}
