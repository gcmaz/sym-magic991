<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SplashController extends Controller
{
    public function splashAction($splash)
    {
        switch($splash){
            // COULD RETURN LIST OF SPLASH PAGES
            case 'default' :
                return $this->render('Magic991MainBundle:Splash:default.html.twig', array(
                    'splash' => $splash
                ));

            // TEACHERS APPRECIATION NIGHT
            case 'teachers-appreciation-night' :
                return $this->render('Magic991MainBundle:Splash:teachersnight.html.twig', array(
                    'splash' => $splash
                ));                
        }
    }
    
}
?>