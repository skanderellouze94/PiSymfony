<?php

namespace EtablissementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hopitaux
 *
 * @ORM\Table(name="hopitaux", indexes={@ORM\Index(name="hopitaux_ibfk_1", columns={"id_etab"})})
 * @ORM\Entity
 */
class Hopitaux extends Etablissements
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="urgence", type="boolean", nullable=false)
     */
    private $urgence;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cnam", type="boolean", nullable=false)
     */
    private $cnam;

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
     * Set type
     *
     * @param string $type
     *
     * @return Hopitaux
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
     * Set urgence
     *
     * @param boolean $urgence
     *
     * @return Hopitaux
     */
    public function setUrgence($urgence)
    {
        $this->urgence = $urgence;

        return $this;
    }

    /**
     * Get urgence
     *
     * @return boolean
     */
    public function getUrgence()
    {
        return $this->urgence;
    }

    /**
     * Set cnam
     *
     * @param boolean $cnam
     *
     * @return Hopitaux
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
     * @return Hopitaux
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
