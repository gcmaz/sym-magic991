<?php
namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Magic991\MainBundle\Entity\Yrmc;
use Magic991\MainBundle\Form\YrmcType;

class YrmcController extends Controller
{
    public function showAction()
    { 
        $entities = $this->getYrmcRepository()->getYrmc();

        if(!$entities){
            throw $this->createNotFoundException('Unable to find data');
        }
        
        return $this->render('Magic991MainBundle:Page:health.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function editAction()
    {
        // get data to populate form
        $entity = $this->getYrmcRepository()->getYrmc();
        $entitydata = $entity[0];
        
        //create the form
        $yrmctext = new Yrmc ();
        $form = $this->createForm(new YrmcType(), $yrmctext, array('data' => $entitydata));
        
        //process the form
        $request = $this->getRequest();
        if($request->getMethod() == 'POST'){
            $form->bind($request);
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                //persist the data in the form to the db
                $yrmctext->setYrmctext($form->getData());
                $em->persist($yrmctext);
                $em->flush();
                
                return $this->redirect($this->generateUrl('Magic991_yrmc_edit'));
            }
        }
        // show the form
        return $this->render('Magic991MainBundle:Page:healtheditor.html.twig', array(
            'form' => $form->createView()
        ));
        
    }
    
    private function getYrmcRepository() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('Magic991MainBundle:Yrmc');
        if(!$entities){
            throw $this->createNotFoundException('Unable to gather data');
        }
        return  $entities;
    }
}
?>
