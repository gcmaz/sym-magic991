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
        // snapwidget.com hashtags
        // ---- random local 
        $a = array(
                1 => "<p>#prescottcollege</p><iframe src=\"http://snapwidget.com/sl/?h=cHJlc2NvdHRjb2xsZWdlfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        2 => "<p>#prescottaz</p><iframe src=\"http://snapwidget.com/sl/?h=cHJlc2NvdHRhenxpbnwxMjV8MnwzfHxub3w1fG5vbmU=\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        3 => "<p>#campverde</p><iframe src=\"http://snapwidget.com/sl/?h=Y2FtcHZlcmRlfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        4 => "<p>#verdevalley</p><iframe src=\"http://snapwidget.com/sl/?h=dmVyZGV2YWxsZXl8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        5 => "<p>#sedona</p><iframe src=\"http://snapwidget.com/sl/?h=c2Vkb25hfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        6 => "<p>#jeromeaz</p><iframe src=\"http://snapwidget.com/sl/?h=amVyb21lYXp8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
        );
        // -- random pop
        //$b = array(
                //1 => "<p>#popmusic</p><iframe src=\"http://snapwidget.com/sl/?h=cG9wbXVzaWN8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        //2 => ""
        //);
        // generate random
        $randA = mt_rand(1,6);
        //$randB = mt_rand(1,2);
        $display_blockA = $a[$randA];
        //$display_blockB = $b[$randB];
        $display_blockB = "<p>#popmusic</p><iframe src=\"http://snapwidget.com/sl/?h=cG9wbXVzaWN8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>";
        
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
                if($contact->getFeedme() === null){
                    //not spam
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
        $display_block = "";
        $pageUrl = $this->generateUrl('Magic991_photos');
        if(isset($_GET['a'])){
                $a = $_GET['a'];
                $display_block = "
                        <a href=\"$pageUrl\" style=\"font-size:16px;margin:0 auto 5px;\">&laquo; Back To Albums</a><br/>
                        <div id=\"galleria\"></div>
                        <script type=\"text/javascript\" charset=\"UTF-8\" >
                        Galleria.loadTheme('/scripts/galleria/themes/classic/galleria.classic.js');
                        Galleria.run('#galleria', {
                         facebook: 'album:$a',
                         width: 660,
                         height: 550,
                         lightbox: true,
                         debug: false
                        });
                        </script>
                ";
        } else {
                $display_block = "
                    <h1>Select A Gallery:</h1>
                    <br/>
                    <p><a href=\"$pageUrl?a=333184483435255\">
                            Gallery One
                    </a></p>
                   ";
        }
        
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
    
    public function weatherAction()
    {
        return $this->render('Magic991MainBundle:Page:weather.html.twig');
    }
}
?>