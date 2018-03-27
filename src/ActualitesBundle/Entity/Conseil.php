<?php

namespace ActualitesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conseil
 *
 * @ORM\Table(name="conseil", indexes={@ORM\Index(name="fk_conseil_cat", columns={"id_categorie"}), @ORM\Index(name="fk_conseil_owner", columns={"id_user"})})
 * @ORM\Entity
 */
class Conseil
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=900, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=900, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_conseil", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConseil;

    /**
     * @var \ActualitesBundle\Entity\Categorie
     *
     * @ORM\ManyToOne(targetEntity="ActualitesBundle\Entity\Categorie")
     * @ORM\JoinColumn(name="id_categorie", referencedColumnName="id_categorie")
     */
    private $categorie;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;



    /**
     * Set description
     *
     * @param string $description
     *
     * @return Conseil
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
     * Set image
     *
     * @param string $image
     *
     * @return Conseil
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get idConseil
     *
     * @return integer
     */
    public function getIdConseil()
    {
        return $this->idConseil;
    }

    /**
     * Set categorie
     *
     * @param \ActualitesBundle\Entity\Categorie $categorie
     *
     * @return Conseil
     */
    public function setCategorie(\ActualitesBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \ActualitesBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set user
     *
     * @param \PidevEsbeBundle\Entity\FosUser $user
     *
     * @return Conseil
     */
    public function setUser(\PidevEsbeBundle\Entity\FosUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \PidevEsbeBundle\Entity\FosUser
     */
    public function getUser()
    {
        return $this->user;
    }
}
