<?php

namespace App\Repository;

use App\Entity\Vulnerabilite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vulnerabilite>
 *
 * @method Vulnerabilite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vulnerabilite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vulnerabilite[]    findAll()
 * @method Vulnerabilite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VulnerabiliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vulnerabilite::class);
    }

    public function save(Vulnerabilite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Vulnerabilite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Vulnerabilite[] Returns an array of Vulnerabilite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Vulnerabilite
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
