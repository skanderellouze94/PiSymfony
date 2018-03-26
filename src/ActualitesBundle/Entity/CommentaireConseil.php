<?php

namespace ActualitesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireConseil
 *
 * @ORM\Table(name="commentaire_conseil", indexes={@ORM\Index(name="fk_com_owner", columns={"id_user"}), @ORM\Index(name="fk_com_conseil", columns={"id_conseil"})})
 * @ORM\Entity
 */
class CommentaireConseil
{
    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=80, nullable=false)
     */
    private $contenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_commentaire", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommentaire;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $idUser;

    /**
     * @var \ActualitesBundle\Entity\Conseil
     *
     * @ORM\ManyToOne(targetEntity="ActualitesBundle\Entity\Conseil")
     * @ORM\JoinColumn(name="id_conseil", referencedColumnName="id_conseil")
     */
    private $idConseil;



    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return CommentaireConseil
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Get idCommentaire
     *
     * @return integer
     */
    public function getIdCommentaire()
    {
        return $this->idCommentaire;
    }

    /**
     * Set idUser
     *
     * @param \PidevEsbeBundle\Entity\FosUser $idUser
     *
     * @return CommentaireConseil
     */
    public function setIdUser(\PidevEsbeBundle\Entity\FosUser $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \PidevEsbeBundle\Entity\FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idConseil
     *
     * @param \ActualitesBundle\Entity\Conseil $idConseil
     *
     * @return CommentaireConseil
     */
    public function setIdConseil(\ActualitesBundle\Entity\Conseil $idConseil = null)
    {
        $this->idConseil = $idConseil;

        return $this;
    }

    /**
     * Get idConseil
     *
     * @return \ActualitesBundle\Entity\Conseil
     */
    public function getIdConseil()
    {
        return $this->idConseil;
    }
}
