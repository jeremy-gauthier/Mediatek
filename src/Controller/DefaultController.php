<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;
use App\Entity\Series;
use App\Entity\Animation;
use App\Entity\Mangas;
use App\Entity\Saison;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        /** @var MoviesRepository */
        $moviesRepository = $this->getDoctrine()->getRepository(Movies::class);

        /** @var SeriesRepository */
        $seriesRepository = $this->getDoctrine()->getRepository(Series::class);

        /** @var AnimationRepository */
        $animationRepository = $this->getDoctrine()->getRepository(Animation::class);

        /** @var MangasRepository */
        $mangasRepository = $this->getDoctrine()->getRepository(Mangas::class);


        // je peux utiliser ma methode de repository personnalisé
        $movies = $moviesRepository->findFiveOrderByTitle();
        $series = $seriesRepository->findFiveOrderByTitle();
        $animation = $animationRepository->findFiveOrderByTitle();
        $mangas = $mangasRepository->findFiveOrderByTitle();

        return $this->render('default/homepage.html.twig', [
            "movies" => $movies,
            "series" => $series,
            "animation" => $animation,
            "mangas" => $mangas 
        ]);
    }


    /**
     * @Route("/movies", name="movies")
     */
    public function allMovies()
    {
        $movies = $this->getDoctrine()->getRepository(Movies::class)->findBy(
            [], 
            ["title" => "ASC"]
        );
        
        return $this->render('default/movies.html.twig', [
            "movies" => $movies 
        ]);
    }

     /**
     * @Route("/series", name="series")
     */
    public function allSeries()
    {
        $series = $this->getDoctrine()->getRepository(Series::class)->findBy(
            [], 
            ["title" => "ASC"]
        );
        
        return $this->render('default/series.html.twig', [
            "series" => $series
        ]);
    }

    /**
     * @Route("/animation", name="animation")
     */
    public function allAnimation()
    {
        $animation = $this->getDoctrine()->getRepository(Animation::class)->findBy(
            [], 
            ["title" => "ASC"]
        );
        
        return $this->render('default/animation.html.twig', [
            "animation" => $animation
        ]);
    }

    /**
     * @Route("/mangas", name="mangas")
     */
    public function allMangas()
    {
        $mangas = $this->getDoctrine()->getRepository(Mangas::class)->findBy(
            [], 
            ["title" => "ASC"]
        );
        
        return $this->render('default/mangas.html.twig', [
            "mangas" => $mangas 
        ]);
    }



    /**
     * @Route("/movie/{id}/view", name="movie_view", requirements={"id" = "\d+"})
     */
    public function viewMovie($id)
    {
        $movie = $this->getDoctrine()->getRepository(Movies::class)->find($id);
        

        if(empty($movie)) {
            throw $this->createNotFoundException("This movie does not exist");
        }
       

        return $this->render('default/movie_view.html.twig', [
            "movie" => $movie
            
        ]);
    }

    /**
     * @Route("/serie/{id}/view", name="serie_view", requirements={"id" = "\d+"})
     */
    public function viewSeries($id)
    {
        $serie = $this->getDoctrine()->getRepository(Series::class)->find($id);

        if(empty($serie)) {
            throw $this->createNotFoundException("This serie does not exist");
        }

        return $this->render('default/serie_view.html.twig', [
            "serie" => $serie
        ]);
    }

    /**
     * @Route("/anime/{id}/view", name="anime_view", requirements={"id" = "\d+"})
     */
    public function viewAnime($id)
    {
        $anime = $this->getDoctrine()->getRepository(Animation::class)->find($id);

        if(empty($anime)) {
            throw $this->createNotFoundException("This anime does not exist");
        }

        return $this->render('default/anime_view.html.twig', [
            "anime" => $anime
        ]);
    }

    /**
     * @Route("/manga/{id}/view", name="manga_view", requirements={"id" = "\d+"})
     */
    public function viewManga($id)
    {
        $manga = $this->getDoctrine()->getRepository(Mangas::class)->find($id);

        if(empty($manga)) {
            throw $this->createNotFoundException("This manga does not exist");
        }

        return $this->render('default/manga_view.html.twig', [
            "manga" => $manga
        ]);
    }

    /**
     * @Route("/saison/{id}/view", name="saison_view", requirements={"id" = "\d+"})
     */
    public function viewSaison($id)
    {
        $saison = $this->getDoctrine()->getRepository(Saison::class)->find($id);
        $episode = $this->getDoctrine()->getRepository(Episodes::class)->find($id);

        if(empty($saison)) {
            throw $this->createNotFoundException("This season does not exist");
        }

        return $this->render('default/saison_view.html.twig', [
            "saison" => $saison,
            "episode" => $episode
        ]);
    }
}
