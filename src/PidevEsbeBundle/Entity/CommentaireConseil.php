<?php

namespace PidevEsbeBundle\Entity;

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
     * @var integer
     *
     * @ORM\Column(name="id_commentaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=80, nullable=false)
     */
    private $contenu;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \Conseil
     *
     * @ORM\ManyToOne(targetEntity="Conseil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_conseil", referencedColumnName="id_conseil")
     * })
     */
    private $idConseil;



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
     * @param \PidevEsbeBundle\Entity\Conseil $idConseil
     *
     * @return CommentaireConseil
     */
    public function setIdConseil(\PidevEsbeBundle\Entity\Conseil $idConseil = null)
    {
        $this->idConseil = $idConseil;

        return $this;
    }

    /**
     * Get idConseil
     *
     * @return \PidevEsbeBundle\Entity\Conseil
     */
    public function getIdConseil()
    {
        return $this->idConseil;
    }
}
