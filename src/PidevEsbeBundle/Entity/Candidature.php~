<?php

namespace PidevEsbeBundle\Entity;

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \PidevEsbeBundle\Entity\Annonce
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Annonce")
     * @ORM\JoinColumn(name="id_annonce", referencedColumnName="id")
     */
    private $idAnnonce;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id")
     */
    private $idUtilisateur;


}

