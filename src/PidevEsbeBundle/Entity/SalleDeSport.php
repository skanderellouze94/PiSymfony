<?php

namespace PidevEsbeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SalleDeSport
 *
 * @ORM\Table(name="salle_de_sport", indexes={@ORM\Index(name="id_etab", columns={"id_etab"})})
 * @ORM\Entity
 */
class SalleDeSport
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
     * @ORM\Column(name="nb_entraineur", type="integer", nullable=false)
     */
    private $nbEntraineur;

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
     * Set nbEntraineur
     *
     * @param integer $nbEntraineur
     *
     * @return SalleDeSport
     */
    public function setNbEntraineur($nbEntraineur)
    {
        $this->nbEntraineur = $nbEntraineur;

        return $this;
    }

    /**
     * Get nbEntraineur
     *
     * @return integer
     */
    public function getNbEntraineur()
    {
        return $this->nbEntraineur;
    }

    /**
     * Set idEtab
     *
     * @param \PidevEsbeBundle\Entity\Etablissements $idEtab
     *
     * @return SalleDeSport
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
