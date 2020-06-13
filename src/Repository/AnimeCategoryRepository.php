<?php

namespace App\Repository;

use App\Entity\Animation;
use App\Entity\AnimeCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeCategory[]    findAll()
 * @method AnimeCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

    class AnimeCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeCategory::class);
    }

    public function findWithAnime($id) {
        $builder = $this->createQueryBuilder('category');

        $builder->where('category.id = :categoryId');
        $builder->setParameter('categoryId', $id);

        $builder->leftJoin('category.animation', 'anime');
        $builder->addSelect('anime');

        $builder->orderBy('anime.title');

        $query = $builder->getQuery();

        return $query->getOneOrNullResult();
    
}}