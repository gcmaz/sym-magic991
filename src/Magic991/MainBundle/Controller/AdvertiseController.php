<?php
namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Magic991\MainBundle\Entity\Advertise;
use Magic991\MainBundle\Form\AdvertiseType;

class AdvertiseController extends Controller
{
        public function enterAction()
        {
            if($this->get('session')->get('advauth') == 1){
                // already entered info, re-entering page
                return $this->redirect($this->generateUrl('Magic991_advertise_show', array('show' => 'contacts')));
            }            
            $advcontact = new Advertise();
            $form = $this->createForm(new AdvertiseType(), $advcontact);
            $request = $this->getRequest();
            if ($request->getMethod() == 'POST'){
                $form->bind($request);

                if($form->isValid()){
                    if($advcontact->getFeedme() === null){
                        //not spam
                        $message = \Swift_Message::newInstance()
                            ->setSubject('Magic 99.1 | Advertising Form')
                            ->setFrom($advcontact->getEmail())
                            ->setReplyTo($advcontact->getEmail())
                            ->setTo($this->container->getParameter('magic.emails.advertise_email'))
                            ->setBody($this->renderView('Magic991MainBundle:Email:advertise.txt.twig', array('advcontact' => $advcontact)));
                        $this->get('mailer')->send($message);

                        $this->get('session')->getFlashBag()->add('advnotice', 'Successfully sent!');
                        $this->get('session')->set('advauth', 1);

                        //redirect - important to prevent repost from page refresh
                        return $this->redirect($this->generateUrl('Magic991_advertise_show', array('show' => 'contacts')));
                        
                    } else {
                        // spam - exit but don't send email and don't show managers page
                        return $this->redirect($this->generateUrl('Magic991_advertise'));
                    }
                }
            }
            return $this->render('Magic991MainBundle:Page:advertise.html.twig', array(
                'form' => $form->createView()
            ));
        }
        
        public function showAction($show)
        {
            return $this->render('Magic991MainBundle:Page:advertise.html.twig', array(
                'show' => $show,
            ));
        }
}
?>
