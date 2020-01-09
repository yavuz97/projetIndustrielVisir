<?php

namespace App\Repository;

use App\Entity\HistoriqueEleve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HistoriqueEleve|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriqueEleve|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriqueEleve[]    findAll()
 * @method HistoriqueEleve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriqueEleveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriqueEleve::class);
    }

    // /**
    //  * @return HistoriqueEleve[] Returns an array of HistoriqueEleve objects
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
    public function findOneBySomeField($value): ?HistoriqueEleve
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
