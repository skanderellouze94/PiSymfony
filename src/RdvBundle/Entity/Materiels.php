<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materiels
 *
 * @ORM\Table(name="materiels", indexes={@ORM\Index(name="fk_materiel", columns={"id_salle"})})
 * @ORM\Entity
 */
class Materiels
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_materiel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMateriel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=20, nullable=false)
     */
    private $description;

    /**
     * @var \Etablissements
     *
     * @ORM\ManyToOne(targetEntity="Etablissements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_salle", referencedColumnName="id")
     * })
     */
    private $idSalle;



    /**
     * Get idMateriel
     *
     * @return integer
     */
    public function getIdMateriel()
    {
        return $this->idMateriel;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Materiels
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
     * Set description
     *
     * @param string $description
     *
     * @return Materiels
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
     * Set idSalle
     *
     * @param \RdvBundle\Entity\Etablissements $idSalle
     *
     * @return Materiels
     */
    public function setIdSalle(\RdvBundle\Entity\Etablissements $idSalle = null)
    {
        $this->idSalle = $idSalle;

        return $this;
    }

    /**
     * Get idSalle
     *
     * @return \RdvBundle\Entity\Etablissements
     */
    public function getIdSalle()
    {
        return $this->idSalle;
    }
}
