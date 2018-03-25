<?php

namespace EtablissementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Laboratoire
 *
 * @ORM\Table(name="laboratoire", indexes={@ORM\Index(name="laboratoire_ibfk_1", columns={"id_etab"})})
 * @ORM\Entity
 */
class Laboratoire extends Etablissements
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="cnam", type="boolean", nullable=false)
     */
    private $cnam;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_equipe", type="integer", nullable=false)
     */
    private $nbEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \EtablissementBundle\Entity\Etablissements
     *
     * @ORM\ManyToOne(targetEntity="EtablissementBundle\Entity\Etablissements")
     * @ORM\JoinColumn(name="id_etab", referencedColumnName="id")
     */
    private $idEtab;



    /**
     * Set cnam
     *
     * @param boolean $cnam
     *
     * @return Laboratoire
     */
    public function setCnam($cnam)
    {
        $this->cnam = $cnam;

        return $this;
    }

    /**
     * Get cnam
     *
     * @return boolean
     */
    public function getCnam()
    {
        return $this->cnam;
    }

    /**
     * Set nbEquipe
     *
     * @param integer $nbEquipe
     *
     * @return Laboratoire
     */
    public function setNbEquipe($nbEquipe)
    {
        $this->nbEquipe = $nbEquipe;

        return $this;
    }

    /**
     * Get nbEquipe
     *
     * @return integer
     */
    public function getNbEquipe()
    {
        return $this->nbEquipe;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Laboratoire
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
     * Set idEtab
     *
     * @param \EtablissementBundle\Entity\Etablissements $idEtab
     *
     * @return Laboratoire
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
