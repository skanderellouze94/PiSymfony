<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce", indexes={@ORM\Index(name="fk_idpart", columns={"id_partenaire"})})
 * @ORM\Entity
 */
class Annonce
{
    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumn(name="id_partenaire", referencedColumnName="id")
     */
    private $idPartenaire;

    /**
     * @var string
     *
     * @ORM\Column(name="domaine", type="string", length=100, nullable=false)
     */
    private $domaine;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date", nullable=false)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expiration", type="date", nullable=false)
     */
    private $dateExpiration;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;




}

