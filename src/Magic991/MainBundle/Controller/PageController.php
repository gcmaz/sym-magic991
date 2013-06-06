<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Magic991\MainBundle\Entity\Contact;
use Magic991\MainBundle\Form\ContactType;
use Magic991\MainBundle\Entity\SongRequest;
use Magic991\MainBundle\Form\SongRequestType;

class PageController extends Controller
{
    public function indexAction()
    {
        $display_blockA = "";
        $display_blockB = "";
        include_once('inc/instagramSnapWidget.php');
        return $this->render('Magic991MainBundle:Page:index.html.twig', array(
            'display_blockA' => $display_blockA,
            'display_blockB' => $display_blockB
        ));
    }
    
    public function contactAction()
    {
        $contact = new Contact ();
        $form = $this->createForm(new ContactType(), $contact);
        
        $request = $this->getRequest();
        
        if ($request->getMethod() == 'POST'){
             $form->bind($request);
            
            if($form->isValid()){
                $message = \Swift_Message::newInstance()
                    ->setSubject('Magic 99.1 | Contact Form')
                    ->setFrom($contact->getEmail())
                    ->setReplyTo($contact->getEmail())
                    ->setTo($this->container->getParameter('magic.emails.contact_email'))
                    ->setBody($this->renderView('Magic991MainBundle:Email:contact.txt.twig', array('contact' => $contact)));
                $this->get('mailer')->send($message);
                
                $this->get('session')->getFlashBag()->add('contactnotice', 'Successfully sent!');
                
                //redirect - important to prevent repost from page refresh
                return $this->redirect($this->generateUrl('Magic991_contact'));
            }
        }
        return $this->render('Magic991MainBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    public function onairAction()
    {
        return $this->render('Magic991MainBundle:Page:onair.html.twig');
    }
    
    public function photosAction()
    {
        $display_block = "";
        include_once('inc/photosEmbed.php');
        return $this->render('Magic991MainBundle:Page:photos.html.twig', array(
            'display_block' => $display_block
        ));
    }
    
    public function songrequestAction()
    {
        $songrequest = new SongRequest();
        $form = $this->createForm(new SongRequestType(), $songrequest);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                //send
                $message = \Swift_Message::newInstance()
                    ->setSubject('Magic 99.1 | Song Request')
                    ->setFrom($songrequest->getEmail())
                    ->setReplyTo($songrequest->getEmail())
                    ->setTo($this->container->getParameter('magic.emails.songrequest_email'))
                    ->setBody($this->renderView('Magic991MainBundle:Email:songrequest.txt.twig', array('songrequest' => $songrequest)));
                $this->get('mailer')->send($message);
                
                $this->get('session')->getFlashBag()->add('songnotice', 'Successfully sent!');

                //redirect - important to prevent repost from page refresh
                return $this->redirect($this->generateUrl('Magic991_songrequest'));
                }
        }
        return $this->render('Magic991MainBundle:Page:songrequest.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    public function concertsAction()
    {
        return $this->render('Magic991MainBundle:Page:concerts.html.twig');
    }

    public function communityAction()
    {
        return $this->render('Magic991MainBundle:Page:community.html.twig');
    }
    
    public function whatsAction()
    {
        return $this->render('Magic991MainBundle:Page:whats.html.twig');
    }
    
    public function petAction()
    {
        return $this->render('Magic991MainBundle:Page:pet.html.twig');
    }
    
    public function jobsAction()
    {
        return $this->render('Magic991MainBundle:Page:jobs.html.twig');
    }
}
?>