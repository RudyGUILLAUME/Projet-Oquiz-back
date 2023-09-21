<?php

namespace App\Repository;

use App\Entity\Category;
use App\Model\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Category>
 *
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function add(Category $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Category $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Get published answers thanks to SearchData Value 
     *
     * @param SearchData $searchData
     * @return PaginationInterface
     */
    public function findBySearch(SearchData $searchData, PaginatorInterface $paginator): PaginationInterface
    {
        // Création d'un objet QueryBuilder pour l'entité représentée par 'a'.
        $data = $this->createQueryBuilder('c')
            ->where('c.name LIKE :name_published')
            ->setParameter('name_published', '%NAME_PUBLISHED%');
            
        // Si le critère 'q' dans l'objet SearchData n'est pas vide,
        // on ajoute une autre condition dans la clause WHERE : le champ 'response' doit être similaire à la valeur du critère 'q'.
        if(!empty($searchData->q)) {
            $data = $data
                ->orWhere('c.name LIKE :q')
                ->setParameter('q', "%{$searchData->q}%");
        }
    
        // Exécution de la requête en récupérant les résultats à l'aide de getResult().
        $data = $data
            ->getQuery()
            ->getResult();

        // Les résultats sont ensuite paginés à l'aide de PaginatorInterface avec la méthode paginate().
        $categories = $paginator->paginate($data, $searchData->page, 9);

        return $categories;
    }

    public function getCategoryTotalScore(): array
    {
        $categories = $this->createQueryBuilder('c')
            ->select('c.id AS category_id, c.name AS category')
            ->getQuery()
            ->getResult();

        $results = [];
        foreach ($categories as $category) {
            $usersAndScores = $this->getUsersAndScoresByCategory($category['category_id']);
            $results[] = [
                'category' => $category['category'],
                'category_id' => $category['category_id'],
                'users' => $usersAndScores,
            ];
        }

        return $results;
    }

    private function getUsersAndScoresByCategory(int $categoryId): array
    {
        $queryBuilder = $this->createQueryBuilder('c')
            ->select('u.username, u.picture, u.id as user_id, SUM(s.score) as categoryScore')
            ->leftJoin('c.quizzes', 'q')
            ->leftJoin('q.scores', 's')
            ->leftJoin('s.user', 'u')
            ->where('c.id = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->groupBy('u.username')
            ->orderBy('categoryScore', 'desc')
            ->getQuery();

        return $queryBuilder->getResult();
    }
}


