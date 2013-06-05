<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class ContestController extends Controller
{
    public function contestAction($contest)
    {
        // DEFAULT
        if($contest == 'default'){
            // could display list of contests here
            return $this->render('Magic991MainBundle:Page:contest.html.twig', array(
                'contest' => $contest
            ));
            
        // MAGIC MASHUP
        } else if ($contest == 'magic-mashup'){
            return $this->render('Magic991MainBundle:Contest:magicmashup.html.twig', array(
                'contest' => $contest
            ));
        }
    }
}
?>
