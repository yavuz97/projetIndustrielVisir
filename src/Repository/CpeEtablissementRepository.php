<?php

namespace App\Repository;

use App\Entity\CpeEtablissement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CpeEtablissement|null find($id, $lockMode = null, $lockVersion = null)
 * @method CpeEtablissement|null findOneBy(array $criteria, array $orderBy = null)
 * @method CpeEtablissement[]    findAll()
 * @method CpeEtablissement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CpeEtablissementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CpeEtablissement::class);
    }

    // /**
    //  * @return CpeEtablissement[] Returns an array of CpeEtablissement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CpeEtablissement
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
