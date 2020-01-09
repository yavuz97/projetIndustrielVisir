<?php

namespace App\Repository;

use App\Entity\Eleve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @method Eleve|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eleve|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eleve[]    findAll()
 * @method Eleve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EleveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Eleve::class);
    }

    /**
    //  * @return Eleve[] Returns an array of Eleve objects
    //  */

    public function tableauCroise($id)

    {

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
               select seq.id, act.nom,
         SUM(case when absent = "oui" then 1 else 0 end)  as present ,
         SUM(case when absent = "non" then 1 else 0 end) as absent,
         SUM(case when absent = "PNI" then 1 else 0 end)  as pni,
         COUNT(absent) as TG,
          SUM(case when absent = "PNI" then 1 else 0 end) +  SUM(case when absent = "oui" then 1 else 0 end)  as Treel,
          seq.date
         from activite act
        JOIN sequence seq ON seq.activite_id = act.id
        JOIN suivie_activite suiv ON suiv.sequence_id = seq.id
        JOIN eleve elv ON elv.id = suiv.eleve_id
        where elv.id = :thisEleve 
        group by act.nom ;
         ';


        $stmt = $conn->prepare($sql);
        //$stmt->bindValue(1, $id);
        $stmt->execute(array('thisEleve' => $id));
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }


    public function tableauCroiseParDate($id, $dateUn)

    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
               select seq.id, act.nom,
         SUM(case when absent = "oui" then 1 else 0 end)  as present ,
         SUM(case when absent = "non" then 1 else 0 end) as absent,
         SUM(case when absent = "PNI" then 1 else 0 end)  as pni,
         COUNT(absent) as TG,
          SUM(case when absent = "PNI" then 1 else 0 end) +  SUM(case when absent = "oui" then 1 else 0 end)  as Treel,
          seq.date
         from activite act
        JOIN sequence seq ON seq.activite_id = act.id
        JOIN suivie_activite suiv ON suiv.sequence_id = seq.id
        JOIN eleve elv ON elv.id = suiv.eleve_id
        where  seq.date == :dateChoix 
        group by act.nom ;
         ';


        $stmt = $conn->prepare($sql);
        $dateUn =  new Date();
        //$id =  15;

     //   $stmt->execute(array('thisEleve' => $id));
        $stmt->execute(array('dateChoix' => $dateUn));
        return $stmt->fetchAll();
    }





    public function eleveCherche()

    {

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
              SELECT * FROM eleve WHERE nom LIKE :thisEleve ;
         ';

        $o = "o%";
        $stmt = $conn->prepare($sql);
        //$stmt->bindValue(1, $id);
        $stmt->execute(array('thisEleve' => $o));
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }



    /**
     * @return Eleve[] Returns an array of eleve objects
     */
    public function findByName($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.nom like :query')
            ->setParameter('query', "%". $value ."%")
            // ->orderBy('c.id', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }








}
