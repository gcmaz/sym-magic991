<?php
namespace Magic991\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Magic991\MainBundle\Entity\Yrmc;

class YrmcFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $yrmcedit = new Yrmc();
        $yrmcedit->setYrmctext(
                '<p class="MsoNormal">
                    <span style="font-family: Georgia, Times;">
                        <strong><span style="font-size: 13.5pt; color: #a7499a;">
                            Next Discussion: May 8, 9:00 am
                        </span></strong>
                    </span>
               </p>');
        $yrmcedit->setCreated(new \DateTime());
        $manager->persist($yrmcedit);
        
        $manager->flush();
    }
}
?>
