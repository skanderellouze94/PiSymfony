<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/03/2018
 * Time: 17:15
 */

namespace AnnonceBundle\Repository;


class AnnonceRepository extends \Doctrine\ORM\EntityRepository
{
    public function findIdDQLP ($idPartenaire)
    {
        $querry = $this->getEntityManager()->createQuery("select a from AnnonceBundle:Annonce a where a.idPartenaire=:idPartenaire")
            ->setParameter('idPartenaire',$idPartenaire);

        return $querry->getResult();
    }
}