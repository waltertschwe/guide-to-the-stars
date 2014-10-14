<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Session\Session;

use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSconfig;


class ConfigController extends Controller
{
    
    /**
    * @Route("/stars/config/{eventId}")
    * @Template()
    */
    public function indexAction($eventId)
    {
         $event = $this->getDoctrine()
            ->getRepository('EntertainmentRedCarpetBundle:Event')
            ->find($eventId);
         
         $configRepo = $this->getDoctrine()
             ->getRepository('EntertainmentGuideToTheStarsBundle:GTSconfig');
        
        $configData = $configRepo->findBy(
                       array('eventId' => $eventId));
        
        if(isset($configData)) {
            
        }
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Config:index.html.twig',
                array('configData' => $configData)
        );
    }
}       
       