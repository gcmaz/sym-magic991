<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Magic991\MainBundle\Entity\Concert;
use Magic991\MainBundle\Entity\Repository\ConcertRepository;

class ConcertController extends Controller
{    
    public function showAction(){ 
        $entities = $this->getConcertDetails();
        return $this->render('Magic991MainBundle:Page:concerts.html.twig', array(
            'entities' => $entities,
        ));
    }
  
    private function getConcertRepository() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('Magic991MainBundle:Concert');
        if(!$entities){
            //throw $this->createNotFoundException('Unable to gather data');
            $entities = "";
        }
        return  $entities;
    }
    
    private function getConcertDetails() {
        $entities = $this->getConcertRepository()->getConcert();
            if(!$entities){
                //throw $this->createNotFoundException('Unable to find any concert data');
                $entities = "";
            }
        return $entities;
    }
                
}
?>