<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RealestateController extends Controller
{
    public function indexAction($id)
    {
        switch($id){
            // default
            case 'default' :
                return $this->render('Magic991MainBundle:Page:realestate.html.twig', array(
                    'id' => $id
                ));
                
        }
    }
    
}
?>