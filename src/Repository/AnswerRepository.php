<?php

namespace App\Repository;

use App\Entity\Answer;
use App\Model\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Answer>
 *
 * @method Answer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Answer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Answer[]    findAll()
 * @method Answer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnswerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Answer::class);
    }

    public function add(Answer $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Answer $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     *  Cette fonction effectue une recherche en utilisant les critères définis dans l'objet SearchData
     *  et renvoie les résultats paginés en utilisant l'objet PaginatorInterface.
     *
     * @param SearchData $searchData
     * @return PaginationInterface
     */
    public function findBySearch(SearchData $searchData, PaginatorInterface $paginator): PaginationInterface
    {

        // Création d'un objet QueryBuilder pour l'entité représentée par 'a'
        // L'entité.champ 'response'
        $data = $this->createQueryBuilder('a')
            ->where('a.response LIKE :response_published')
            ->setParameter('response_published', '%RESPONSE_PUBLISHED%');
            

        // Si le critère 'q' (le input) dans l'objet SearchData n'est pas vide,
        // on ajoute une autre condition dans la clause WHERE : le champ 'response' doit être similaire à la valeur du critère 'q'.
        if(!empty($searchData->q)) {
            $data = $data
                ->orWhere('a.response LIKE :q')
                ->setParameter('q', "%{$searchData->q}%");
        }

        // Exécution de la requête en récupérant les résultats à l'aide de getResult().
        $data = $data
            ->getQuery()
            ->getResult();

        // On pagine les resultats à l'aide de PaginatorInterface avec la méthode paginate().
        $answers = $paginator->paginate($data, $searchData->page, 9);

        // Enfin, la fonction renvoie les résultats paginés.
        return $answers;
    }


//    /**
//     * @return Answer[] Returns an array of Answer objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Answer
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
