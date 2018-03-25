<?php

namespace PidevEsbeBundle\Entity;

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


}

