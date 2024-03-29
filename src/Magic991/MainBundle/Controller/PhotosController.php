<?php

namespace Magic991\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhotosController extends Controller
{
    public function showPhotos(){
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
                    <p><a href=\"$pageUrl?a=556401554429388\">
                        TEACHERS APPRECIATION NIGHT 2013
                    </a></p>
                   ";
        }
        
        return $display_block;
    }
}
?>