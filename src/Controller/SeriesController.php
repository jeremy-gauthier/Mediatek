<?php

namespace App\Controller;

use App\Entity\Series;
use App\Entity\Saison;
use App\Form\SeriesType;
use App\Repository\SeriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/series")
 */
class SeriesController extends AbstractController
{
    /**
     * @Route("/series", name="series_index", methods={"GET"})
     */
    public function index(SeriesRepository $seriesRepository): Response
    {
        return $this->render('series/index.html.twig', [
            'series' => $seriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="serie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $serie = new Series();
        $form = $this->createForm(SeriesType::class, $serie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($serie);
            $entityManager->flush();

            return $this->redirectToRoute('series');
        }

        return $this->render('series/new.html.twig', [
            'serie' => $serie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/serie/{id}/edit", name="serie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Series $serie): Response
    {
        $form = $this->createForm(SeriesType::class, $serie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('serie_view', ['id' => $serie->getId()]);
        }

        return $this->render('series/edit.html.twig', [
            'serie' => $serie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/serie/{id}/delete", name="serie_delete",requirements={"id" = "\d+"})
     */
    public function delete(Request $request, Series $serie): Response
    {
         {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($serie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('series');
    }
}
