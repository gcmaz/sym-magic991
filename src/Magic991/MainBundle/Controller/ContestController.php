<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class ContestController extends Controller
{
    public function contestAction($contest)
    {
        switch($contest){
            case 'default' :
                // could display list of contests here
                return $this->render('Magic991MainBundle:Page:contest.html.twig', array(
                    'contest' => $contest
                ));
                
            // 2013 NISSAN VERSA NOTE
            case 'win-a-nissan-versa-note' :  
                return $this->render('Magic991MainBundle:Contest:nissanversa.html.twig', array(
                    'contest' => $contest
                ));
                
            // MAGIC MASHUP
            case 'magic-mashup' :
                return $this->render('Magic991MainBundle:Contest:magicmashup.html.twig', array(
                    'contest' => $contest
                ));
                
        }
    }
}
?>
