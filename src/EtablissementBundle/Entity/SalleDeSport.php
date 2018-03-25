<?php

namespace EtablissementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SalleDeSport
 *
 * @ORM\Table(name="salle_de_sport", indexes={@ORM\Index(name="id_etab", columns={"id_etab"})})
 * @ORM\Entity
 */
class SalleDeSport extends Etablissements
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nb_entraineur", type="integer", nullable=false)
     */
    private $nbEntraineur;

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
     * @return SalleDeSport
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
