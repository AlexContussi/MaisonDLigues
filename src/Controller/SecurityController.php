<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Licencie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Json;
use SymfonyCasts\Bundle\VerifyEmail;
// use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class SecurityController extends AbstractController
{
    #[Route(path: '/connexion', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    // #[Route(path: '/inscription', name: 'app_register_2')]
    // public function app_register_2(): Response
    // {
    //     return $this->render('security/registerEtape1.html.twig', [
    //         'controller_name' => 'SecurityController',
    //     ]);
    
    // }

    // #[Route(path: '/verifierNumLicence', name: 'verifierNumLicence')]
    // public function verifierNumLicence(Request $request,EntityManagerInterface $em,): Response
    // {
    //     $numLicence = $request->request->get('numlicence');
    //     $licenceData = $em->getRepository(Licencie::class)->findOneByNumlicence($numLicence);
    //     if($licenceData != null){
    //         return $this->render('security/registerEtape2.html.twig', [
    //             'controller_name' => 'SecurityController',
    //             'licenceData' => $licenceData,
    //         ]);
    //     }else{
    //         return new JsonResponse('erreur');
    //     }    
    // }
}
