<?php

namespace App\Controller;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Syfmony\component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class RegistrationController extends AbstractController
{
    #[Route('/registration', name: 'app_registration')]
    public function registration(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        //instancier la table Users
        $users = new Users();
      
        if ($request->isMethod("POST")) {
            $username = $_POST['_username'];
            $password = $_POST['_password'];
            $email = $_POST['_email'];
            $firstname = $_POST['_firstname'];
            $lastname = $_POST['_lastname'];   
            
            $users->setUsername($username);

            $hashedPassword = $passwordHasher->hashPassword(
                $users,
                $password);

            $users->setPassword($hashedPassword);
            $users->setEmail($email);
            $users->setFirstname($firstname);
            $users->setLastname($lastname);
            $users->setRoles(['ROLE_USER']);
          
        
            $entityManager->persist($users);
            
            
            var_dump($entityManager->flush());

        }
      

        return $this->render('registration/index.html.twig');
    }
}
