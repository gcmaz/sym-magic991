<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swift_Message;

use Magic991\MainBundle\Controller\InstagramController;
use Magic991\MainBundle\Controller\PetController;
use Magic991\MainBundle\Controller\PhotosController;
use Magic991\MainBundle\Entity\Contact;
use Magic991\MainBundle\Entity\SongRequest;
use Magic991\MainBundle\Form\ContactType;
use Magic991\MainBundle\Form\SongRequestType;

class PageController extends Controller
{
    public function indexAction()
    {
        //get pet of the week for splash box
        $Pet = new PetController();
        $Pet->setContainer($this->container);
        $petData = $Pet->splashAction();

        //get instagram snapwidget
        $Instagram = new InstagramController();
        $Instagram->setContainer($this->container);
        $sw = $Instagram->snapwidget();
        
        return $this->render('Magic991MainBundle:Page:index.html.twig', array(
            'entities' => $petData,
            'display_blockA' => $sw[0],
            'display_blockB' => $sw[1]
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
                if($contact->getFeedme() === null){
                    //not spam
                    $message = Swift_Message::newInstance()
                        ->setSubject('Magic 99.1 | Contact Form')
                        ->setFrom($contact->getEmail())
                        ->setReplyTo($contact->getEmail())
                        ->setTo($this->container->getParameter('magic.emails.contact_email'))
                        ->setBody($this->renderView('Magic991MainBundle:Email:contact.txt.twig', array('contact' => $contact)));
                    $this->get('mailer')->send($message);

                    $this->get('session')->getFlashBag()->add('contactnotice', 'Successfully sent!');

                    //redirect - important to prevent repost from page refresh
                    return $this->redirect($this->generateUrl('Magic991_contact'));
                    
                } else {
                    // spam - exit but don't send email and don't show managers page
                    return $this->redirect($this->generateUrl('Magic991_contact'));
                }
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
        $Photos = new PhotosController();
        $Photos->setContainer($this->container);
        $photo_block = $Photos->showPhotos();
        
        return $this->render('Magic991MainBundle:Page:photos.html.twig', array(
            'display_block' => $photo_block
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
                $message = Swift_Message::newInstance()
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
    
    public function jobsAction()
    {
        return $this->render('Magic991MainBundle:Page:jobs.html.twig');
    }
    
    public function weatherAction()
    {
        return $this->render('Magic991MainBundle:Page:weather.html.twig');
    }
}
?>