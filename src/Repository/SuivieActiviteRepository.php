<?php

namespace App\Repository;

use App\Entity\SuivieActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SuivieActivite|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuivieActivite|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuivieActivite[]    findAll()
 * @method SuivieActivite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuivieActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuivieActivite::class);
    }

    // /**
    //  * @return SuivieActivite[] Returns an array of SuivieActivite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SuivieActivite
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
