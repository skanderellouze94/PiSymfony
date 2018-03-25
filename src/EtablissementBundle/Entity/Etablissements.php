<?php

namespace EtablissementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissements
 *
 * @ORM\Table(name="etablissements", indexes={@ORM\Index(name="fk_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Etablissements
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=50, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=900, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="date_ouverture", type="string", length=50, nullable=false)
     */
    private $dateOuverture;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fermeture", type="string", length=50, nullable=false)
     */
    private $dateFermeture;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="fax", type="integer", nullable=false)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="page_facebook", type="string", length=1000, nullable=false)
     */
    private $pageFacebook;

    /**
     * @var string
     *
     * @ORM\Column(name="site_web", type="string", length=2000, nullable=false)
     */
    private $siteWeb;

    /**
     * @var integer
     *
     * @ORM\Column(name="heure_ouverture", type="integer", nullable=true)
     */
    private $heureOuverture;

    /**
     * @var integer
     *
     * @ORM\Column(name="heure_fermeture", type="integer", nullable=false)
     */
    private $heureFermeture;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Etablissements
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Etablissements
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Etablissements
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
     * Set dateOuverture
     *
     * @param string $dateOuverture
     *
     * @return Etablissements
     */
    public function setDateOuverture($dateOuverture)
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    /**
     * Get dateOuverture
     *
     * @return string
     */
    public function getDateOuverture()
    {
        return $this->dateOuverture;
    }

    /**
     * Set dateFermeture
     *
     * @param string $dateFermeture
     *
     * @return Etablissements
     */
    public function setDateFermeture($dateFermeture)
    {
        $this->dateFermeture = $dateFermeture;

        return $this;
    }

    /**
     * Get dateFermeture
     *
     * @return string
     */
    public function getDateFermeture()
    {
        return $this->dateFermeture;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Etablissements
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Etablissements
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fax
     *
     * @param integer $fax
     *
     * @return Etablissements
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return integer
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set pageFacebook
     *
     * @param string $pageFacebook
     *
     * @return Etablissements
     */
    public function setPageFacebook($pageFacebook)
    {
        $this->pageFacebook = $pageFacebook;

        return $this;
    }

    /**
     * Get pageFacebook
     *
     * @return string
     */
    public function getPageFacebook()
    {
        return $this->pageFacebook;
    }

    /**
     * Set siteWeb
     *
     * @param string $siteWeb
     *
     * @return Etablissements
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    /**
     * Get siteWeb
     *
     * @return string
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }

    /**
     * Set heureOuverture
     *
     * @param integer $heureOuverture
     *
     * @return Etablissements
     */
    public function setHeureOuverture($heureOuverture)
    {
        $this->heureOuverture = $heureOuverture;

        return $this;
    }

    /**
     * Get heureOuverture
     *
     * @return integer
     */
    public function getHeureOuverture()
    {
        return $this->heureOuverture;
    }

    /**
     * Set heureFermeture
     *
     * @param integer $heureFermeture
     *
     * @return Etablissements
     */
    public function setHeureFermeture($heureFermeture)
    {
        $this->heureFermeture = $heureFermeture;

        return $this;
    }

    /**
     * Get heureFermeture
     *
     * @return integer
     */
    public function getHeureFermeture()
    {
        return $this->heureFermeture;
    }

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
     * Set user
     *
     * @param \PidevEsbeBundle\Entity\FosUser $user
     *
     * @return Etablissements
     */
    public function setUser(\PidevEsbeBundle\Entity\FosUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \PidevEsbeBundle\Entity\FosUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Etablissements
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    public function __toString()
    {
        return $this->getNom();
    }


}
