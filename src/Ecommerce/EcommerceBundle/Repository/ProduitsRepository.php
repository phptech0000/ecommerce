<?php

namespace Ecommerce\EcommerceBundle\Repository;

/**
 * ProduitsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitsRepository extends \Doctrine\ORM\EntityRepository
{
    public function findArray($array){
        $qb = $this->createQueryBuilder('p')
                    ->select('p')
                    ->where('p.id IN (:array)')
                    ->setParameter('array', $array);

        return $qb->getQuery()->getResult();
    }


    public function byCategorie($categorie){
        $qb = $this->createQueryBuilder('p')
            ->where('p.categorie = :categorie')
            ->andWhere('p.disponible = 1')
            ->orderBy('p.id')
            ->setParameter('categorie',$categorie);

        return $qb->getQuery()->getResult();
    }

    public function recherche($chaine){
        $qb = $this->createQueryBuilder('p')
                ->select('p')
                ->where('p.nom LIKE :chaine')
                ->andWhere('p.disponible = 1')
                ->orderBy('p.id')
                ->setParameter('chaine', '%'.$chaine.'%');

        return $qb->getQuery()->getResult();
    }

}
