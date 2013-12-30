<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Magic991\MainBundle\Entity\Massage;
use Magic991\MainBundle\Form\MassageType;

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
                
            // MASSAGE ENVY
            case 'massage-envy-office-of-the-week' :  
                $massage = new Massage();
                $form = $this->createForm(new MassageType(), $massage);

                $request = $this->getRequest();
                if ($request->getMethod() == 'POST') {
                    $form->bind($request);

                    if ($form->isValid()) {
                        //send
                        $message = \Swift_Message::newInstance()
                            ->setSubject('Magic | Massage Envy Office of theWeek Entry')
                            ->setFrom($massage->getEmail())
                            ->setReplyTo($massage->getEmail())
                            ->setTo($this->container->getParameter('magic.emails.contest.massage'))
                            ->setBody($this->renderView('Magic991MainBundle:Email:massage.txt.twig', array('massage' => $massage)));
                        $this->get('mailer')->send($message);

                        $this->get('session')->getFlashBag()->add('massagenotice', 'Your office is entered! Thank you for playing!');

                        //redirect - important to prevent repost from page refresh
                        return $this->redirect($this->generateUrl('Magic991_contest', array('contest' => 'massage-envy-office-of-the-week')));
                        }
                   }

                return $this->render('Magic991MainBundle:Contest:massageenvy.html.twig', array(
                    'form' => $form->createView(),
                    'contest' => $contest,
                    'status' => 'live'
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
