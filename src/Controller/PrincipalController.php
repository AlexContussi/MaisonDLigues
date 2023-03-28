<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Atelier;
use App\Entity\Hotel;
use App\Entity\Proposer;
use App\Entity\Nuite;
use App\Entity\Inscription;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use DateTime;

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
    public function ateliers(ManagerRegistry $mr)
    {
        $ateliersData = $mr->getRepository(Atelier::class)->findAll();
        return $this->render('ateliers.html.twig', [
            'ateliersData'=>$ateliersData,
        ]);
    }

    #[Route('/reserverAteliers', name: 'reserverAteliers')]
    public function reserverAteliers(ManagerRegistry $mr)
    {
        $ateliersData = $mr->getRepository(Atelier::class)->findAll();
        $formulesData = $mr->getRepository(Hotel::class)->findAll();
        return $this->render('reserverAteliers.html.twig', [
            'ateliersData'=>$ateliersData,
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

    #[Route('/ajaxShowPartialTarifsFormule', name: 'ajaxShowPartialTarifsFormule')]
    public function ajaxShowPartialTarifsFormule(EntityManagerInterface $em ,Request $request)
    {
        $idhotel = $request->request->get('idhotel');
        $hotelData = $em->getRepository(Hotel::class)->findById($idhotel);
        return $this->render('partial/_partialTarifsFormule.html.twig', [
            'hotelData'=>$hotelData,
        ]);
    }

    #[Route('/ajaxValiderReservation', name: 'ajaxValiderReservation')]
    public function ajaxValiderReservation(EntityManagerInterface $em ,Request $request)
    {
        $idsAteliers = json_decode($request->request->get('idsAteliers'));
        $tabNuites = json_decode($request->request->get('tabNuites'));
        $proposerData = $em->getRepository(Proposer::class)->findAll();
        $atelierData = $em->getRepository(Atelier::class)->findAll();
        $proposer=[];
        $ateliers=[];
        foreach($proposerData as $pd){
            $proposer[$pd->getId()]=$pd;
        }
        foreach($atelierData as $ad){
            $ateliers[$ad->getId()]=$ad;
        }
        foreach($tabNuites as $nuite){
            $newNuite = new Nuite;
            $newNuite->setDateStart(new DateTime($nuite->date1));
            $newNuite->setDateEnd(new DateTime($nuite->date2));
            $newNuite->setHotel($proposer[$nuite->idPropodition]->getHotel());
            $newNuite->setCategorie($proposer[$nuite->idPropodition]->getCategorie());
            $newNuite->setInscription($em->getRepository(Inscription::class)->findOneByCompte($this->getUser()));  
            $em->persist($newNuite);
        }        
        foreach($idsAteliers as $atelier){
            $ateliers[$atelier]->addInscription($em->getRepository(Inscription::class)->findOneByCompte($this->getUser()));
            $em->persist($newNuite);
        }
        $em->flush();

        return $this->render('test.html.twig', [
            'tabNuites'=>$tabNuites,
            'idsAteliers'=>$idsAteliers,
            'user'=>$this->getUser(),
        ]);
    }
    
    #[Route('/inscription', name: 'inscription')]
    public function inscription(EntityManagerInterface $em){
      if($em->getRepository(Inscription::class)->findOneByCompte($this->getUser())!= null){
         new JsonResponse('Erreur');
      }else{
        $inscription = new Inscription();
        $inscription->setCompte($this->getUser());
        $inscription->setDateInscription(new DateTime());
        $em->persist($inscription);
        $em->flush();
        new JsonResponse('Ok');
      }
        
    }
    

}
