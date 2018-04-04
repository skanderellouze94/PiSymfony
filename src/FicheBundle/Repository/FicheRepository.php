<?php

namespace FicheBundle\Repository;

class FicheRepository extends  \Doctrine\ORM\EntityRepository
{
    public function findEtabByUser($id)
    {
        $querry = $this->getEntityManager()->createQuery("select e from EtablissementBundle:Etablissements e,
        PidevEsbeBundle:FosUser f where 
        ((f='".$id."')  and(e.user= f) )");

        return $querry->getResult();
    }
    public function fichePatientNonexistant($id)
    {
        $querry = $this->getEntityManager()->createQuery("select f from PidevEsbeBundle:FosUser f
        ,  FicheBundle:FichePatient fp where 
        ((f<>'".$id."')  and (f.id<>fp.idpatient))");

        return $querry->getResult();
    }
    public function findFiltredFields($filtredFields){
        unset($filtredFields['_token']);

        $query = $this->createQueryBuilder('m')
            ->select('m');
        foreach($filtredFields as $field=>$value){

            if($value !=''){
                $query
                    ->andWhere('m.'.$field.' =  :value')
                    ->setParameter('value', $value);
            }

        }
        return $query;
    }
}
