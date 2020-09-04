<?php

namespace App\Repository;

use App\Entity\HodnotaStitek;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HodnotaStitek|null find($id, $lockMode = null, $lockVersion = null)
 * @method HodnotaStitek|null findOneBy(array $criteria, array $orderBy = null)
 * @method HodnotaStitek[]    findAll()
 * @method HodnotaStitek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HodnotaStitekRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HodnotaStitek::class);
    }

    // /**
    //  * @return HodnotaStitek[] Returns an array of HodnotaStitek objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HodnotaStitek
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
