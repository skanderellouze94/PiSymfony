<?php
/**
 * Created by PhpStorm.
 * User: Maha
 * Date: 29/03/2018
 * Time: 03:20
 */

namespace ActualitesBundle\Repository;


class DemandeRepository extends  \Doctrine\ORM\EntityRepository
{
    public function AccepterDemandeDQL()
    {
        $querry = $this->getEntityManager()->createQuery("select c from ActualitesBundle:Categorie c where c.type ='Evenement'");
        return $querry->getResult();
    }

       /* String sql ="UPDATE demande SET etat = 'accéptée' WHERE id_demande ="+d.getId_demande()+";";
        String sql2="UPDATE fos_user set roles= 'partenaire'  WHERE id ="+d.getUser().getId()+";";
    }*/

    public function RefuserDemandeDQL()
    {
        $querry = $this->getEntityManager()->createQuery("select c from ActualitesBundle:Categorie c where c.type ='Conseil'");
        return $querry->getResult();
    }
}