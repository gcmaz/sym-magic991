<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SplashController extends Controller
{
    public function splashAction($splash)
    {
        return $this->render('Magic991MainBundle:Page:splashpage.html.twig', array(
            'splash' => $splash
        ));
    }
    
}
?>

