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
        if ($request->getMethod() == 'POST') {
            $event = new Event();
            $eventName = $request->request->get('event_name');
            $eventShortName = str_replace(' ', '_', $eventName);
            
            $event->setEventName($eventName);
            $event->setEventShortName($eventShortName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
        }
        
        
        return $this->redirect($this->generateUrl('entertainment_redcarpet_event_index'));
    }
    
    /**
     * @Route("/events/update/{eventId}")
     */
    public function updateAction($eventId) {
        
        
        $events = $this->getDoctrine()
        ->getRepository('EntertainmentRedCarpetBundle:Event')
        ->find($eventId);

        if (!$eventId) {
            throw $this->createNotFoundException(
                'No event id found '.$eventId
            );
        }
        
        
        return new Response('Update');
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
       
       
       $repository = $this->getDoctrine()
             ->getRepository('EntertainmentRedCarpetBundle:Event');
             
       $event = $repository->findOneBy(
                    array ('event_id' => $eventId));
                    
       var_dump($event);
       
       
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
    
     
}
