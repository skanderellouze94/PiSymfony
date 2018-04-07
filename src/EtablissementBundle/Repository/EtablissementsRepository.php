<?php

namespace EtablissementBundle\Repository;

use EtablissementBundle\Entity\Etablissements;

class EtablissementsRepository extends  \Doctrine\ORM\EntityRepository
{
    public function findFiltredFields($filtredFields){
        unset($filtredFields['_token']);

        $fields = array(
                'nom','adresse','email'
        );
        $query = $this->createQueryBuilder('m')
            ->select('m');
        foreach($fields as $field){

                $query
                        ->orWhere('m.'.$field.' LIKE  :value')

                        ->setParameter('value', '%'.$filtredFields['field'].'%');
        }
        return $query;
    }


}
