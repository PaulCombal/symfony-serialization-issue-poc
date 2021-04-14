<?php

namespace App\Repository;

use App\Entity\DateTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DateTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateTest[]    findAll()
 * @method DateTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DateTest::class);
    }

    // /**
    //  * @return DateTest[] Returns an array of DateTest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DateTest
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
