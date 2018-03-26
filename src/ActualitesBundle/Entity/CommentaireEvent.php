<?php

namespace ActualitesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireEvent
 *
 * @ORM\Table(name="commentaire_event", indexes={@ORM\Index(name="fk_com_event", columns={"id_event"}), @ORM\Index(name="b", columns={"id_user"})})
 * @ORM\Entity
 */
class CommentaireEvent
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
     * @var \ActualitesBundle\Entity\Evenements
     *
     * @ORM\ManyToOne(targetEntity="ActualitesBundle\Entity\Evenements")
     * @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     */
    private $idEvent;



    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return CommentaireEvent
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
     * @return CommentaireEvent
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
     * Set idEvent
     *
     * @param \ActualitesBundle\Entity\Evenements $idEvent
     *
     * @return CommentaireEvent
     */
    public function setIdEvent(\ActualitesBundle\Entity\Evenements $idEvent = null)
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    /**
     * Get idEvent
     *
     * @return \ActualitesBundle\Entity\Evenements
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }
}
