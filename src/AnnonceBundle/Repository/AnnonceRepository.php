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
//    public function findFiltredFields($filtredFields){
//        unset($filtredFields['_token']);
//
//        $query = $this->createQueryBuilder('m')
//            ->select('m');
//        foreach($filtredFields as $field=>$value){
//
//            if($value !=''){
//                $query
//                    ->andWhere('m.'.$field.' = :value')
//                    ->setParameter('value', $value);
//            }
//
//        }
//        return $query;
//    }

    public function findAnnonceDQL($domaine)
    {
        $query=$this->getEntityManager()
            ->createQuery("select a from AnnonceBundle:Annonce a WHERE a.domaine LIKE :domaine")
            ->setParameter('domaine','%'.$domaine.'%');
        return $query->getResult();
    }

}

