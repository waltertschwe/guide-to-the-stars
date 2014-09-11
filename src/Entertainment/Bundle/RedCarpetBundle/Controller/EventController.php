<?php

namespace Entertainment\Bundle\RedCarpetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Entertainment\Bundle\RedCarpetBundle\Entity\Event;

class EventController extends Controller
{
    
    /**
     * @Route("/events/index")
     */
    public function indexAction()
    {
        
         $events = array();
          
         $repository = $this->getDoctrine()
             ->getRepository('EntertainmentRedCarpetBundle:Event');
             
         $events = $repository->findAll();
        
         return $this->render(
            'EntertainmentRedCarpetBundle:Event:index.html.twig',
            array('events' => $events)
        );
    }
    
    /**
     * @Route("/events/create")
     */
    public function createAction() {
        
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            $event = new Event();
            $eventName = $request->request->get('event_name');
            $eventShortName = str_replace(' ', '_', $eventName);
           
            $event->setDateTime(new \DateTime(date('Y-m-d H:i:s')));
            $event->setEventName($eventName);
            $event->setEventShortName($eventShortName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
        }
        
        
        return $this->redirect($this->generateUrl('entertainment_redcarpet_event_index'));
    }
    
   
    /**
     * @Route("/events/dashboard/{eventId}")
     */
    public function dashboardAction($eventId) {
       
        $event = $this->getDoctrine()
        ->getRepository('EntertainmentRedCarpetBundle:Event')
        ->find($eventId);

        if (!$eventId) {
            throw $this->createNotFoundException(
                'No event id found '.$eventId
            );
        }
       
       
       return $this->render(
            'EntertainmentRedCarpetBundle:Event:dashboard.html.twig',
            array('event' => $event)           
        );
    } 
    
     /**
     * @Route("/events/config/{eventId}")
     */
    public function configAction($eventId) {
        
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            
            $eventId = $request->request->get('event-id');
            $em = $this->getDoctrine()->getManager();
            $event = $em->getRepository('EntertainmentRedCarpetBundle:Event')->find($eventId);
     
            if (!$event) {
                throw $this->createNotFoundException(
                   'No event id found for event id = '.$eventId
                 );
            }

            $siteState = $request->request->get('site-state');
            $eventName = $request->request->get('event-name');
            $eventShortName = str_replace(' ', '_', $eventName);
            $isArrivals = $request->request->get('arrivals');
            $isGTS = $request->request->get('gts');
            $isBrackets = $request->request->get('brackets');
            
            $event->setEventState($siteState);
            $event->setEventName($eventName);
            $event->setEventShortName($eventShortName);
            $event->setIsArrivals($isArrivals);
            $event->setIsGuideToStars($isGTS);
            $event->setIsBrackets($isBrackets);
          
            $em->flush();
            
        } 
          
       $repository = $this->getDoctrine()
             ->getRepository('EntertainmentRedCarpetBundle:Event');
             
       $event = $repository->findOneBy(
                    array ('event_id' => $eventId));
                    
       return $this->render(
            'EntertainmentRedCarpetBundle:Event:config.html.twig',
            array('event' => $event)           
        );
    }
    
   
        
    //TEMP PLACE HOLDER
    public function jsonAction() {
        //$response = new Response(json_encode(array('name' => $name)));
        //$response->headers->set('Content-Type', 'application/json');
    }
    
     /**
     * @Route("/events/test")
     */
    public function testAction() {
    
        
        return new Response('Test');
    }
     
}
