<?php

namespace App\Repository;

use App\Entity\PurchaseLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PurchaseLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method PurchaseLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method PurchaseLine[]    findAll()
 * @method PurchaseLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PurchaseLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PurchaseLine::class);
    }

    // /**
    //  * @return PurchaseLine[] Returns an array of PurchaseLine objects
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
    public function findOneBySomeField($value): ?PurchaseLine
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
