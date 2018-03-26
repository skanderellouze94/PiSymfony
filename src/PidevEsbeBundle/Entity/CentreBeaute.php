<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentreBeaute
 *
 * @ORM\Table(name="centre_beaute", indexes={@ORM\Index(name="centre_beaute_ibfk_1", columns={"id_etab"})})
 * @ORM\Entity
 */
class CentreBeaute
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
     * @var integer
     *
     * @ORM\Column(name="nb_employee", type="integer", nullable=false)
     */
    private $nbEmployee;

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
     * Set idEtab
     *
     * @param \PidevEsbeBundle\Entity\Etablissements $idEtab
     *
     * @return CentreBeaute
     */
    public function setIdEtab(\PidevEsbeBundle\Entity\Etablissements $idEtab = null)
    {
        $this->idEtab = $idEtab;

        return $this;
    }

    /**
     * Get idEtab
     *
     * @return \PidevEsbeBundle\Entity\Etablissements
     */
    public function getIdEtab()
    {
        return $this->idEtab;
    }
}
