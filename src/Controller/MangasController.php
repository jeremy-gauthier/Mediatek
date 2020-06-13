<?php

namespace App\Controller;

use App\Entity\Mangas;
use App\Form\MangasType;
use App\Repository\MangasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mangas")
 */
class MangasController extends AbstractController
{
    /**
     * @Route("/mangas", name="mangas_index", methods={"GET"})
     */
    public function index(MangasRepository $mangasRepository): Response
    {
        return $this->render('mangas/index.html.twig', [
            'mangas' => $mangasRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="manga_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $manga = new Mangas();
        $form = $this->createForm(MangasType::class, $manga);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($manga);
            $entityManager->flush();

            return $this->redirectToRoute('mangas');
        }

        return $this->render('mangas/new.html.twig', [
            'manga' => $manga,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/manga/{id}/edit", name="manga_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mangas $manga): Response
    {
        $form = $this->createForm(MangasType::class, $manga);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('manga_view', ['id' => $manga->getId()]);
        }

        return $this->render('mangas/edit.html.twig', [
            'manga' => $manga,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/manga/{id}/delete", name="manga_delete",requirements={"id" = "\d+"})
     */
    public function delete(Request $request, Mangas $manga): Response
    {
       {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($manga);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mangas');
    }
}
