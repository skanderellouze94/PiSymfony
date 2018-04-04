<?php

namespace EtablissementBundle\Repository;

class EtablissementsRepository extends  \Doctrine\ORM\EntityRepository
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
