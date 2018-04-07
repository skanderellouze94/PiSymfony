<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PidevEsbeBundle\Entity\FosUser;

/**
 * Commentaireforum
 *
 * @ORM\Table(name="commentaireforum", indexes={@ORM\Index(name="user", columns={"user"}), @ORM\Index(name="forum", columns={"forum"})})
 * @ORM\Entity
 */
class Commentaireforum
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
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=5000, nullable=false)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \PidevEsbeBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \ForumBundle\Entity\Forum
     *
     * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\Forum")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="forum", referencedColumnName="id")
     * })
     */
    private $forum;



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
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Commentaireforum
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commentaireforum
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \PidevEsbeBundle\Entity\FosUser $user
     *
     * @return Commentaireforum
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

    /**
     * Set forum
     *
     * @param \ForumBundle\Entity\Forum $forum
     *
     * @return Commentaireforum
     */
    public function setForum(\ForumBundle\Entity\Forum $forum = null)
    {
        $this->forum = $forum;

        return $this;
    }

    /**
     * Get forum
     *
     * @return \ForumBundle\Entity\Forum
     */
    public function getForum()
    {
        return $this->forum;
    }
}
