<?php

namespace App\Repository;

use App\Entity\Quiz;
use App\Model\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Quiz>
 *
 * @method Quiz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quiz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quiz[]    findAll()
 * @method Quiz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuizRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quiz::class);
    }

    public function add(Quiz $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Quiz $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Cette fonction du repository permet de chercher un quiz au hasard dans la base
     * @return array
     */
    public function getOneRandomQuiz()
    {
        // On effectue la requete en SQL pour avoir accès facilement
        // Aux fonctions SQL telles que random()

        // Récupération de la connection database
        $connection = $this->getEntityManager()->getConnection();

        $query = "SELECT quiz.id, name, picture, question.question AS question, GROUP_CONCAT(answer.response) AS responses
                    FROM quiz
                    JOIN question ON quiz.id = question.quiz_id
                    JOIN answer ON question.id = answer.question_id
                    GROUP BY question
                    ORDER BY RAND()";

        // On retourne le film séléctionné
        $result = $connection->executeQuery($query);

        return $result->fetchAssociative();
    }

    /**
     * Cette fonction du repository permet de récupérer les quiz des créateurs du site, via le mot clé "perso" dans la colonne `picture`
     * @return array
     */
    public function getPersonalQuiz()
    {
        $connection = $this->getEntityManager()->getConnection();

        $query = "SELECT *
                    FROM quiz
                    WHERE picture LIKE '%perso-%'";

        $result = $connection->executeQuery($query); 
        
        return $result->fetchAllAssociative();
    }

    public function findBySearch(SearchData $searchData, PaginatorInterface $paginator): PaginationInterface
    {
        // Création d'un objet QueryBuilder pour l'entité représentée par 'a'.
        $data = $this->createQueryBuilder('q')
            ->where('q.name LIKE :name_published')
            ->setParameter('name_published', '%NAME_PUBLISHED%');

        // Si le critère 'q' dans l'objet SearchData n'est pas vide,
        // on ajoute une autre condition dans la clause WHERE : le champ 'response' doit être similaire à la valeur du critère 'q'.
        if(!empty($searchData->q)) {
            $data = $data
                ->orWhere('q.name LIKE :q')
                ->setParameter('q', "%{$searchData->q}%");
            }
        // Exécution de la requête en récupérant les résultats à l'aide de getResult().

        $data = $data
            ->getQuery()
            ->getResult();

        // Les résultats sont ensuite paginés à l'aide de PaginatorInterface avec la méthode paginate().
        $answers = $paginator->paginate($data, $searchData->page, 9);

        return $answers;
    }
}
