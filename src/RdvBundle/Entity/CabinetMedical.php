<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CabinetMedical
 *
 * @ORM\Table(name="cabinet_medical", indexes={@ORM\Index(name="cabinet_medical_ibfk_1", columns={"id_etab"})})
 * @ORM\Entity
 */
class CabinetMedical
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cnam", type="boolean", nullable=false)
     */
    private $cnam;

    /**
     * @var \Etablissements
     *
     * @ORM\ManyToOne(targetEntity="Etablissements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_etab", referencedColumnName="id")
     * })
     */
    private $idEtab;



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
     * Set cnam
     *
     * @param boolean $cnam
     *
     * @return CabinetMedical
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
     * Set idEtab
     *
     * @param \RdvBundle\Entity\Etablissements $idEtab
     *
     * @return CabinetMedical
     */
    public function setIdEtab(\RdvBundle\Entity\Etablissements $idEtab = null)
    {
        $this->idEtab = $idEtab;

        return $this;
    }

    /**
     * Get idEtab
     *
     * @return \RdvBundle\Entity\Etablissements
     */
    public function getIdEtab()
    {
        return $this->idEtab;
    }
}
