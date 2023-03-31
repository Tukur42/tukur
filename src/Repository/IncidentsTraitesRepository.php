<?php

namespace App\Repository;

use App\Entity\IncidentsTraites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IncidentsTraites>
 *
 * @method IncidentsTraites|null find($id, $lockMode = null, $lockVersion = null)
 * @method IncidentsTraites|null findOneBy(array $criteria, array $orderBy = null)
 * @method IncidentsTraites[]    findAll()
 * @method IncidentsTraites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IncidentsTraitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IncidentsTraites::class);
    }

    public function save(IncidentsTraites $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IncidentsTraites $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return IncidentsTraites[] Returns an array of IncidentsTraites objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IncidentsTraites
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
