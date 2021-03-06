<?php

namespace ForumBundle\Repository;

/**
 * ForumRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ForumRepository extends \Doctrine\ORM\EntityRepository
{
    public function findFiltredFields($filtredFields){
        unset($filtredFields['_token']);

        $query = $this->createQueryBuilder('m')
            ->select('m');
        foreach($filtredFields as $field=>$value){

            if($value !=''){
                $query
                    ->andWhere('m.'.$field.' LIKE  :value')
                    ->setParameter('value', '%'.$value.'%');
            }

        }
        return $query;
    }
}
