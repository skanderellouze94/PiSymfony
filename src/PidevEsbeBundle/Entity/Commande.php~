<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="fk_comande_owner", columns={"id_user"}), @ORM\Index(name="id_commande", columns={"id_commande"}), @ORM\Index(name="id_commande_2", columns={"id_commande"}), @ORM\Index(name="id_commande_3", columns={"id_commande"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produits", mappedBy="idCommande")
     */
    private $idProduit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProduit = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

