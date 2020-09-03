<?php

namespace App\Repository;

use App\Entity\Vyrobce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vyrobce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vyrobce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vyrobce[]    findAll()
 * @method Vyrobce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VyrobceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vyrobce::class);
    }

    // /**
    //  * @return Vyrobce[] Returns an array of Vyrobce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vyrobce
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
