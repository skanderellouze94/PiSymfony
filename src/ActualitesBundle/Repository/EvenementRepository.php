<?php
/**
 * Created by PhpStorm.
 * User: Maha
 * Date: 29/03/2018
 * Time: 01:25
 */


namespace ActualitesBundle\Repository;

class EvenementRepository extends  \Doctrine\ORM\EntityRepository
{
    public function findCurrentDateDQL()
    {
        $querry = $this->getEntityManager()->createQuery("select e from ActualitesBundle:Evenements e where (e.dateDebut) = CURRENT_DATE()");
        return $querry->getResult();
    }

    public function findDateDemainDQL()
    {
        $querry = $this->getEntityManager()->createQuery("select e from ActualitesBundle:Evenements e where (e.dateDebut) = CURRENT_DATE()+1");
        return $querry->getResult();
    }

    public function findDateSemaineDQL()
    {
        $querry = $this->getEntityManager()->createQuery("select e from ActualitesBundle:Evenements e where (((e.dateDebut) >= CURRENT_DATE()) and ((e.dateDebut) <= CURRENT_DATE()+7))");
        return $querry->getResult();
    }


    public function AfficherEvenements3DQL()
    {
        $querry = $this->getEntityManager()->createQuery("select e from ActualitesBundle:Evenements e ORDER BY e.idEvent DESC  ");
        return $querry->getResult();
    }
}
