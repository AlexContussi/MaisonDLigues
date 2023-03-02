<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Atelier;
use App\Entity\Hotel;
use Doctrine\Persistence\ManagerRegistry;
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
       #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('principal/login.html.twig', [
            'controller_name' => 'PrincipalController',
        ]);
    }

    #[Route('/ateliers', name: 'ateliers')]
    public function ateliers(ManagerRegistry $mr)
    {
        $ateliersData = $mr->getRepository(Atelier::class)->findAll();
        $formulesData = $mr->getRepository(Hotel::class)->findAll();
        return $this->render('ateliers.html.twig', [
            'ateliersData'=>$ateliersData,
            'formulesData'=>$formulesData,
        ]);
    }

    #[Route('/ajaxAddFormule', name: 'ajaxAddFormule')]
    public function ajaxAddFormule(ManagerRegistry $mr)
    { 
        $formulesData = $mr->getRepository(Hotel::class)->findAll();
        return $this->render('partial/_partialMacroFormules.html.twig', [
            'formulesData'=>$formulesData,
        ]);
    }
    
    #[Route('/formules', name: 'formules')]
    public function formules(ManagerRegistry $mr)
    {
        $formulesData = $mr->getRepository(Hotel::class)->findAll();
        return $this->render('formules.html.twig', [
            'formulesData'=>$formulesData,
        ]);
    }
    

}
