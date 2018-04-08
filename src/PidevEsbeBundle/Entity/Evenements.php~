<?php

namespace PidevEsbeBundle\Entity;

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
     * @var integer
     *
     * @ORM\Column(name="id_event", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="idCreator", referencedColumnName="id")
     */
    private $idCreator;

    /**
     * @var \PidevEsbeBundle\Entity\Categorie
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Categorie")
     * @ORM\JoinColumn(name="id_categorie", referencedColumnName="id_categorie")
     */
    private $idCategorie;




}

