<?php

namespace App\Repository;

use App\Entity\VoiturePersonnel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method VoiturePersonnel|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoiturePersonnel|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoiturePersonnel[]    findAll()
 * @method VoiturePersonnel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoiturePersonnelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VoiturePersonnel::class);
    }

    // /**
    //  * @return VoiturePersonnel[] Returns an array of VoiturePersonnel objects
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
    public function findOneBySomeField($value): ?VoiturePersonnel
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
