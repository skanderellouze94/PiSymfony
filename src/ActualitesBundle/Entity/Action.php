<?php
/**
 * Created by PhpStorm.
 * User: elbrh
 * Date: 3/9/18
 * Time: 1:39 PM
 */

namespace ActualitesBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="action")
 * @ORM\Entity
 */
class Action
{


    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\OneToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="id_user" ,referencedColumnName="id")
     *
     */
    private $idUser;

    /**
     * @ORM\OneToOne(targetEntity="ActualitesBundle\Entity\Evenements")
     * @ORM\JoinColumn(name="id_event" ,referencedColumnName="id_event")
     *
     */
    private $idEvent;

    /**
     * @var string
     * @ORM\Column(name="type",type="string")
     */
    private $type ;



    /**
     * Set type
     *
     * @param string $type
     *
     * @return Action
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set idUser
     *
     * @param \PidevEsbeBundle\Entity\FosUser $idUser
     *
     * @return Action
     */
    public function setIdUser(\PidevEsbeBundle\Entity\FosUser $idUser)
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
     * @return Action
     */
    public function setIdEvent(\ActualitesBundle\Entity\Evenements $idEvent)
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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

}
