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
    public function createAction($eventId)
    {
       
          
         $event = $this->getDoctrine()
            ->getRepository('EntertainmentRedCarpetBundle:Event')
            ->find($eventId);
        
        ## get all categories that are associated with the event
        $categories = $event->getCategory();
        
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            
            
        }
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:create.html.twig',
            array('event' => $event, 'categories' => $categories)
        );
            
    }
    
     /**
     * @Route("/stars/updateAction")
     */
    public function updateAction($starId)
    {
        
    }
    
    
}
