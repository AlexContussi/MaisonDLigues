<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Atelier;
use App\Entity\Hotel;
use Symfony\Component\HttpFoundation\JsonResponse;

class PrincipalController extends AbstractController
{
    #[Route('/', name: 'app_principal')]
    public function index(): Response
    {
        return $this->render('principal/index.html.twig', [
            'controller_name' => 'PrincipalController',
        ]);
    }

    #[Route('/ateliers', name: 'ateliers')]
    public function ateliers()
    {
        $ateliersData = $this->getDoctrine()->getRepository(Atelier::class)->findAll();
        return $this->render('ateliers.html.twig', [
            'ateliersData'=>$ateliersData,
        ]);
    }
    
    #[Route('/formules', name: 'formules')]
    public function formules()
    {
        $formulesData = $this->getDoctrine()->getRepository(Hotel::class)->findAll();
        return $this->render('formules.html.twig', [
            'formulesData'=>$formulesData,
        ]);
    }

}
