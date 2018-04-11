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
     * @var \PidevEsbeBundle\Entity\Conseil
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\Conseil")
     * @ORM\JoinColumn(name="id_conseil", referencedColumnName="id_conseil")
     */
    private $idConseil;


}

