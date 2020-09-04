<?php

namespace App\Repository;

use App\Entity\Barva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Barva|null find($id, $lockMode = null, $lockVersion = null)
 * @method Barva|null findOneBy(array $criteria, array $orderBy = null)
 * @method Barva[]    findAll()
 * @method Barva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarvaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Barva::class);
    }

    // /**
    //  * @return Barva[] Returns an array of Barva objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Barva
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
