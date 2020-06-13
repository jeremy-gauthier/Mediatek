<?php

namespace App\Controller;

use App\Entity\Animation;
use App\Entity\AnimeCategory;
use App\Form\AnimationType;
use App\Repository\AnimationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/animation")
 */
class AnimationController extends AbstractController
{
    /**
     * @Route("/animation", name="animation_index", methods={"GET"})
     */
    public function index(AnimationRepository $animationRepository): Response
    {
        return $this->render('animation/index.html.twig', [
            'animations' => $animationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="anime_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $anime = new Animation();
        $form = $this->createForm(AnimationType::class, $anime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($anime);
            $entityManager->flush();

            return $this->redirectToRoute('animation');
        }

        return $this->render('animation/new.html.twig', [
            'anime' => $anime,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="animation_show", methods={"GET"})
     */
    public function show(Animation $animation): Response
    {
        return $this->render('animation/show.html.twig', [
            'animation' => $animation,
        ]);
    }

    /**
     * @Route("/anime/{id}/edit", name="anime_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Animation $anime): Response
    {
        $form = $this->createForm(AnimationType::class, $anime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('anime_view', ['id' => $anime->getId()]);
        }

        return $this->render('animation/edit.html.twig', [
            'anime' => $anime,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/anime/{id}/delete", name="anime_delete", requirements={"id" = "\d+"})
     */
    public function delete(Request $request, Animation $anime): Response
    {
         {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($anime);
            $entityManager->flush();
        }

        return $this->redirectToRoute('animation');
    }
}
