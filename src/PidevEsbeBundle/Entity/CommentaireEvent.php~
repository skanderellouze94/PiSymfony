<?php

namespace PidevEsbeBundle\Entity;

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
     * @var \PidevEsbeBundle\Entity\Evenements
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Evenements")
     * @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     */
    private $idEvent;


}

