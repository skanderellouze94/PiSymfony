<?php

namespace RdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichepatient
 *
 * @ORM\Table(name="fichepatient", indexes={@ORM\Index(name="fk_fiche_owner", columns={"idPatient"}), @ORM\Index(name="fk_fiche_etab", columns={"idEtab"})})
 * @ORM\Entity
 */
class Fichepatient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_fiche", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFiche;

    /**
     * @var string
     *
     * @ORM\Column(name="suivie", type="string", length=3000, nullable=false)
     */
    private $suivie;

    /**
     * @var string
     *
     * @ORM\Column(name="suivieHTML", type="string", length=5000, nullable=false)
     */
    private $suiviehtml;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPatient", referencedColumnName="id")
     * })
     */
    private $idpatient;

    /**
     * @var \Etablissements
     *
     * @ORM\ManyToOne(targetEntity="Etablissements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEtab", referencedColumnName="id")
     * })
     */
    private $idetab;



    /**
     * Get idFiche
     *
     * @return integer
     */
    public function getIdFiche()
    {
        return $this->idFiche;
    }

    /**
     * Set suivie
     *
     * @param string $suivie
     *
     * @return Fichepatient
     */
    public function setSuivie($suivie)
    {
        $this->suivie = $suivie;

        return $this;
    }

    /**
     * Get suivie
     *
     * @return string
     */
    public function getSuivie()
    {
        return $this->suivie;
    }

    /**
     * Set suiviehtml
     *
     * @param string $suiviehtml
     *
     * @return Fichepatient
     */
    public function setSuiviehtml($suiviehtml)
    {
        $this->suiviehtml = $suiviehtml;

        return $this;
    }

    /**
     * Get suiviehtml
     *
     * @return string
     */
    public function getSuiviehtml()
    {
        return $this->suiviehtml;
    }

    /**
     * Set idpatient
     *
     * @param \RdvBundle\Entity\FosUser $idpatient
     *
     * @return Fichepatient
     */
    public function setIdpatient(\RdvBundle\Entity\FosUser $idpatient = null)
    {
        $this->idpatient = $idpatient;

        return $this;
    }

    /**
     * Get idpatient
     *
     * @return \RdvBundle\Entity\FosUser
     */
    public function getIdpatient()
    {
        return $this->idpatient;
    }

    /**
     * Set idetab
     *
     * @param \RdvBundle\Entity\Etablissements $idetab
     *
     * @return Fichepatient
     */
    public function setIdetab(\RdvBundle\Entity\Etablissements $idetab = null)
    {
        $this->idetab = $idetab;

        return $this;
    }

    /**
     * Get idetab
     *
     * @return \RdvBundle\Entity\Etablissements
     */
    public function getIdetab()
    {
        return $this->idetab;
    }
}
