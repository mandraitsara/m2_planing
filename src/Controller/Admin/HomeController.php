<?php

namespace App\Controller\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{   

    #[Route('admin/', 'admin.home.planning_mariage')]
    public function home()
    {
        $templates = '/admin/home.html.twig';
        $context = [
            'test' => "Bonjour tout le monde"
        ];
        return $this->render($templates, $context);
    }

}

?>