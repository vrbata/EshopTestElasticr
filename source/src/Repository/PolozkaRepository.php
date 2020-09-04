<?php

namespace App\Repository;

use App\Entity\Polozka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Polozka|null find($id, $lockMode = null, $lockVersion = null)
 * @method Polozka|null findOneBy(array $criteria, array $orderBy = null)
 * @method Polozka[]    findAll()
 * @method Polozka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolozkaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Polozka::class);
    }

    
    public function findByCiselnaHodnota($value) //
    {
        return $this->createQueryBuilder('p')
            ->Join('App\Entity\Stitek', 's')
            ->where('s.Nazev = ?1')
            ->andWhere('p.Kategorie = ?2')
            ->setParameter(1, 'Ciselna_Hodnota')
            ->setParameter(2, $value)
            ->getQuery()
            ->getResult();  
        
    }

    // /**
    //  * @return Polozka[] Returns an array of Polozka objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Polozka
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
