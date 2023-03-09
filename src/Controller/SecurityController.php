<?php

namespace App\Controller;
use App\Entity\Compte;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }
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


    #[Route(path: '/register', name: 'app_register')]
    public function register(): Response
    {
        return $this->render('security/registerEtape1.html.twig', [
        ]);
    }


    #[Route('/verifierNumLicence', name: 'verifierNumLicence')]
    public function verifierNumLicence(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $numLicence = $request->request->get('numlicence');
        dump($numLicence);
        $licenceData = $entityManager->getRepository(Licencie::class)->findOneByNumlicence($numLicence);
        $user = new Compte();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $user->setRoles([]);
            $entityManager->persist($user);
            $entityManager->flush();
            // generate a signed url and email it to the user
            // $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
            //     (new TemplatedEmail())
            //         ->from(new Address('contact@maison-des-ligues.com', 'Confirmation'))
            //         ->to($user->getEmail())
            //         ->subject('Please Confirm your Email')
            //         ->htmlTemplate('registration/confirmation_email.html.twig')
            // );
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/registerEtape2.html.twig', [
            'registrationForm' => $form->createView(),
            'licenceData' => $licenceData,

        ]);
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        // try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        // } catch (VerifyEmailExceptionInterface $exception) {
        //     $this->addFlash('verify_email_error', $exception->getReason());

        //     return $this->redirectToRoute('app_register');
        // }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_register');
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
