<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\QuizeType;
use App\Service\QuizeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizeController extends AbstractController
{
    public function __construct(private QuizeService $quizeService)
    {
    }

    #[Route(path: '/', name: 'question', methods: ['GET', 'POST'])]
    public function question(Request $request): Response
    {
        $form = $this->createForm(QuizeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $userId = $this->quizeService->setUserAnswers($request->request->all('answer'));
            return $this->redirectToRoute('answer', ['id' => $userId], Response::HTTP_SEE_OTHER);
        }

        return $this->render('question.html.twig', ['form' => $form]);
    }

    #[Route(path: '/answer', name: 'answer', methods: ['GET'])]
    public function answer(): Response
    {
        return $this->render('answer.html.twig');
    }
}
