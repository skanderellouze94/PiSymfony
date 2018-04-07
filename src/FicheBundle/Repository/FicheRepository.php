<?php

namespace FicheBundle\Repository;

use EtablissementBundle\Entity\Etablissements;

class FicheRepository extends  \Doctrine\ORM\EntityRepository
{

    public function fichePatientNonexistant(Etablissements $etab)
    {
        $id = $etab->getId();
        $etabUser = $etab->getUser();

        $query =  $this->getEntityManager()->createQuery('SELECT F FROM PidevEsbeBundle:FosUser F '
                    .' LEFT JOIN EtablissementBundle:Etablissements E WITH E.user = F.id '
                    .'WHERE F NOT IN ( SELECT F2 FROM FicheBundle:Fichepatient FP JOIN PidevEsbeBundle:FosUser F2 '.
                    ' WITH FP.idpatient = F2.id  WHERE FP.idetab = '.$id.' ) '
                    .' AND F.id != '.$etabUser->getId()
                    );

        return $query->getResult();
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
