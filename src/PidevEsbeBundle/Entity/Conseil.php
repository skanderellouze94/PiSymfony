<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conseil
 *
 * @ORM\Table(name="conseil", indexes={@ORM\Index(name="fk_conseil_cat", columns={"id_categorie"}), @ORM\Index(name="fk_conseil_owner", columns={"id_user"})})
 * @ORM\Entity
 */
class Conseil
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=900, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=900, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_conseil", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConseil;

    /**
     * @var \PidevEsbeBundle\Entity\Categorie
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Categorie")
     * @ORM\JoinColumn(name="id_categorie", referencedColumnName="id_categorie")
     */
    private $categorie;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;


}

