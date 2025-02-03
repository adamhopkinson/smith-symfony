<?php

namespace App\Controller;

use App\Form\CalculatorType;
use App\Model\Sum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CalculatorController extends AbstractController
{
    #[Route('/calculator', name: 'calculator_show', methods: ['GET', 'POST'])]
    public function showCalculator(Request $request): Response
    {
        $sum = new Sum();
        $form = $this->createForm(CalculatorType::class, $sum);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sum = $form->getData();

            return $this->render('calculator/show.html.twig', [
                'form' => $form,
                'sum' => $sum,
            ]);
        }

        return $this->render('calculator/show.html.twig', [
            'form' => $form,
        ]);
    }
}
