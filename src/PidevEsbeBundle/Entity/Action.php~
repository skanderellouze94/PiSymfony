<?php
/**
 * Created by PhpStorm.
 * User: elbrh
 * Date: 3/9/18
 * Time: 1:39 PM
 */

namespace PidevEsbeBundle\Entity;
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
     * @ORM\OneToOne(targetEntity="PidevEsbeBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="id_user" ,referencedColumnName="id")
     * @ORM\Id
     */
    private $idUser;

    /**
     * @ORM\OneToOne(targetEntity="PidevEsbeBundle\Entity\Evenements")
     * @ORM\JoinColumn(name="id_event" ,referencedColumnName="id_event")
     * @ORM\Id
     */
    private $idEvent;

    /**
     * @var string
     * @ORM\Column(name="type",type="string")
     */
    private $type ;


}