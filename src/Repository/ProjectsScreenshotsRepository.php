<?php

namespace App\Repository;

use App\Entity\ProjectsScreenshots;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProjectsScreenshots|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectsScreenshots|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectsScreenshots[]    findAll()
 * @method ProjectsScreenshots[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectsScreenshotsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectsScreenshots::class);
    }

    // /**
    //  * @return ProjectsScreenshots[] Returns an array of ProjectsScreenshots objects
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
    public function findOneBySomeField($value): ?ProjectsScreenshots
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
