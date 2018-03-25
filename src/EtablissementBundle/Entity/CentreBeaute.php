<?php

namespace EtablissementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentreBeaute
 *
 * @ORM\Table(name="centre_beaute", indexes={@ORM\Index(name="centre_beaute_ibfk_1", columns={"id_etab"})})
 * @ORM\Entity
 */
class CentreBeaute extends Etablissements
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nb_employee", type="integer", nullable=false)
     */
    private $nbEmployee;

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
     * Set nbEmployee
     *
     * @param integer $nbEmployee
     *
     * @return CentreBeaute
     */
    public function setNbEmployee($nbEmployee)
    {
        $this->nbEmployee = $nbEmployee;

        return $this;
    }

    /**
     * Get nbEmployee
     *
     * @return integer
     */
    public function getNbEmployee()
    {
        return $this->nbEmployee;
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
     * @return CentreBeaute
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
