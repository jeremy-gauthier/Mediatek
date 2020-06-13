<?php

namespace App\Repository;

use App\Entity\Movies;
use App\Entity\MovieCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MovieCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovieCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovieCategory[]    findAll()
 * @method MovieCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

    class MovieCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovieCategory::class);
    }

    public function findWithMovie($id) {
        $builder = $this->createQueryBuilder('category');

        $builder->where('category.id = :categoryId');
        $builder->setParameter('categoryId', $id);

        $builder->leftJoin('category.movies', 'movie');
        $builder->addSelect('movie');

        $builder->orderBy('movie.title');

        $query = $builder->getQuery();

        return $query->getOneOrNullResult();
    
}}
