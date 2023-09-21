<?php

namespace App\Repository;

use App\Entity\Score;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Score>
 *
 * @method Score|null find($id, $lockMode = null, $lockVersion = null)
 * @method Score|null findOneBy(array $criteria, array $orderBy = null)
 * @method Score[]    findAll()
 * @method Score[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Score::class);
    }

    public function add(Score $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Score $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
    * @return Score[] Returns an array of the total score of one user
    */
    public function getUserTotalScore(int $userId): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT IDENTITY(s.user) AS userId, u.username AS username, SUM(s.score) AS totalScore
            FROM App\Entity\Score s
            JOIN s.user u
            WHERE s.user = :userId
        '
        );

        $query->setParameter('userId', $userId);

        return $query->getResult();
    }

    /**
     * @return Score[] Returns an array of the total score of all users (top 10 ranking)
     */
    public function getTop10UsersTotalScore(int $limit = 10): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT IDENTITY(s.user) AS userId, u.username AS username, u.picture AS userPicture, SUM(s.score) AS totalScore
            FROM App\Entity\Score s
            JOIN s.user u
            GROUP BY s.user
            ORDER BY totalScore DESC
        '
        );

        return $query->setMaxResults($limit)->getResult();
    }
}
