<?php

namespace App\Repository;

use App\Entity\Question;
use App\Model\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Question>
 *
 * @method Question|null find($id, $lockMode = null, $lockVersion = null)
 * @method Question|null findOneBy(array $criteria, array $orderBy = null)
 * @method Question[]    findAll()
 * @method Question[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    public function add(Question $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Question $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findBySearch(SearchData $searchData, PaginatorInterface $paginator): PaginationInterface
    {
        // Création d'un objet QueryBuilder pour l'entité représentée par 'a'.
        $data = $this->createQueryBuilder('q')
            ->where('q.question LIKE :question_published')
            ->setParameter('question_published', '%QUESTION_PUBLISHED%');

        // Si le critère 'q' dans l'objet SearchData n'est pas vide,
        // on ajoute une autre condition dans la clause WHERE : le champ 'response' doit être similaire à la valeur du critère 'q'.
        if(!empty($searchData->q)) {
            $data = $data
                ->orWhere('q.question LIKE :q')
                ->setParameter('q', "%{$searchData->q}%");
        }

        // Exécution de la requête en récupérant les résultats à l'aide de getResult().
        $data = $data
            ->getQuery()
            ->getResult();

        // Les résultats sont ensuite paginés à l'aide de PaginatorInterface avec la méthode paginate().
        $questions = $paginator->paginate($data, $searchData->page, 9);

        return $questions;
    }

        
    }

//    /**
//     * @return Question[] Returns an array of Question objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Question
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

