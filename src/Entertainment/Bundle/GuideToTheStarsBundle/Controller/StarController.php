<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class StarController extends Controller
{
    
     /**
     * @Route("/stars/index/{eventId}")
     */
    public function indexAction($eventId)
    {
        
        $event = $this->getDoctrine()
        ->getRepository('EntertainmentRedCarpetBundle:Event')
        ->find($eventId);
        
        $stars = array();
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:index.html.twig',
            array('event' => $event, 'stars' => $stars)
        );
        
    }
    
    /**
     * @Route("/stars/create/{eventId}")
     */
    public function createAction()
    {
       
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:create.html.twig'
        );
            
    }
    
     /**
     * @Route("/stars/updateAction")
     */
    public function updateAction($starId)
    {
        
    }
    
    
}
