<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/home")
     */
class HomeController extends AbstractController
{
  
    /**
     * @Route("/contact", name="home_contact")
     */
    public function contact()
    { 
        return $this->render('home/contact.html.twig');
    }
    /**
     * @Route("/about", name="home_about")
     */
    public function about()
    { 
            return $this->render('home/about.html.twig');
    }
     
}
