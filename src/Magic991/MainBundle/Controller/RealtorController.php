<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Magic991\MainBundle\Entity\Realtor;

class RealtorController extends Controller
{
    public function show2Action()
    { 
        return $this->render('Magic991MainBundle:Page:realtor2.html.twig');
    }  
    
    // begin cms version
    
    private function getRealtorRepository() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('Magic991MainBundle:Realtor');
        if(!$entities){
            throw $this->createNotFoundException('Unable to gather data');
        }
        return  $entities;
    }

    public function showAction()
    { 
        $entities = $this->getRealtorRepository()->getListing();

        if(!$entities){
            throw $this->createNotFoundException('Unable to find data');
        }

        return $this->render('Magic991MainBundle:Page:realtor.html.twig', array(
            'entities' => $entities,
        ));
    }
    
}
?>