<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Entertainment\Bundle\GuideToTheStarsBundle\Entity\Event;

class EventsController extends Controller
{
    
    /**
     * @Route("/events/index")
     */
    public function indexAction()
    {
         $data = array();
        
         return $this->render(
            'EntertainmentGuideToTheStarsBundle:Events:index.html.twig',
            array('data' => $data)
        );
    }
    
    /**
     * @Route("/events/create")
     */
    public function createAction() {
        
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $event = new Event();
            $eventName = $request->request->get('event_name');
            $eventDescription = $request->get('event_description');
            $eventShortName = str_replace(' ', '_', $eventName);
            
            $event->setEventName($eventName);
            $event->setEventDescription($eventDescription);
            $event->setEventShortName($eventShortName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
        }
        
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Events:create.html.twig'           
        );
    }
    
    /**
     * @Route("/events/update")
     */
    public function updateAction() {
        
        return new Response('Create');
    }
    
   
}
