<?php

    namespace App\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    

    class LoginController extends AbstractController
    {
        #[Route('/identification', name:'login_mariage')]
        public function loginMariage()
        {
            $templates = "login.html.twig";

            return $this->render($templates);
        }
        #[Route('/inscription', name:'inscription_mariage')]
        public function inscriMariage(){
            
            $templates = "inscription.html.twig";

            return $this->render($templates);
        }
    }
?>