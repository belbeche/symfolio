<?php

namespace App\Repository;

use App\Entity\ProjectsTags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProjectsTags|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectsTags|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectsTags[]    findAll()
 * @method ProjectsTags[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectsTagsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectsTags::class);
    }

    // /**
    //  * @return ProjectsTags[] Returns an array of ProjectsTags objects
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
    public function findOneBySomeField($value): ?ProjectsTags
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
