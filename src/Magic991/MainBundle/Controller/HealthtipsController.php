<?php
namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Magic991\MainBundle\Entity\Healthtips;
use Magic991\MainBundle\Form\HealthtipsType;

class HealthtipsController extends Controller
{
    public function showAction()
    { 
        $entities = $this->getHealthtipsRepository()->getHealthtips();

        if(!$entities){
            throw $this->createNotFoundException('Unable to find data');
        }
        
        return $this->render('Magic991MainBundle:Page:healthtips.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function editAction()
    {
        // get data to populate form
        $entity = $this->getHealthtipsRepository()->getHealthtips();
        $entitydata = $entity[0];
        
        //create the form
        $text = new Healthtips();
        $form = $this->createForm(new HealthtipsType(), $text, array('data' => $entitydata));
        
        //process the form
        $request = $this->getRequest();
        if($request->getMethod() == 'POST'){
            $form->bind($request);
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                //persist the data in the form to the db
                $text->setText($form->getData());
                $em->persist($text);
                $em->flush();
                
                return $this->redirect($this->generateUrl('Magic991_healthtips_edit'));
            }
        }
        // show the form
        return $this->render('Magic991MainBundle:Page:healthtipseditor.html.twig', array(
            'form' => $form->createView()
        ));
        
    }
    
    private function getHealthtipsRepository() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('Magic991MainBundle:Healthtips');
        if(!$entities){
            throw $this->createNotFoundException('Unable to gather data');
        }
        return  $entities;
    }
}
?>
