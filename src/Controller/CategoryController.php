<?php

namespace App\Controller;

use App\Entity\MovieCategory;
use App\Repository\MovieCategoryRepository;
use App\Entity\AnimeCategory;
use App\Repository\AnimeCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}/movie", name="category_movie", requirements={"id" = "\d+"})
     */
    public function movieCategory($id)
    {
        /** @var MovieCategoryRepository */
        $repository = $this->getDoctrine()->getRepository(MovieCategory::class);

        $category = $repository->findWithMovie($id);

        return $this->render('category/movie.html.twig', [
            "category" => $category
        ]);
    }

    /**
     * @Route("/category/{id}/anime", name="category_anime", requirements={"id" = "\d+"})
     */
    public function animeCategory($id)
    {
        /** @var AnimeCategoryRepository */
        $repository = $this->getDoctrine()->getRepository(AnimeCategory::class);

        $category = $repository->findWithAnime($id);

        return $this->render('category/anime.html.twig', [
            "category" => $category
        ]);
    }
}