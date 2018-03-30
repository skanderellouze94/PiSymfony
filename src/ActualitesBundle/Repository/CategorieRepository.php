<?php
/**
 * Created by PhpStorm.
 * User: Maha
 * Date: 29/03/2018
 * Time: 03:20
 */

namespace ActualitesBundle\Repository;


class CategorieRepository extends  \Doctrine\ORM\EntityRepository
{
    public function RechercheTypeEvenementDQL()
    {
        $querry = $this->getEntityManager()->createQuery("select c from ActualitesBundle:Categorie c where e.type ='Evenement'");
        return $querry->getResult();
    }

    public function RechercheTypeConseilDQL()
    {
        $querry = $this->getEntityManager()->createQuery("select c from ActualitesBundle:Categorie c where e.type ='Conseil'");
        return $querry->getResult();
    }
}