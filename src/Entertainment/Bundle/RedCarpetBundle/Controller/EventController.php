<?php

namespace Entertainment\Bundle\RedCarpetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Session\Session;

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
         $request = $this->get('request');
        
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
           
            $session = new Session();
            $session->getFlashBag()->add('notice', 'Success! Event created');
            $lastEventId = $event->getId();
            
            $repository = $this->getDoctrine()
             ->getRepository('EntertainmentRedCarpetBundle:Event'); 
            $events = $repository->findAll();
        
            return $this->render(
                'EntertainmentRedCarpetBundle:Event:index.html.twig',
                array('events' => $events, 'lastEventId' => $lastEventId)
            );     
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
        
        $repository = $this->getDoctrine()
              ->getRepository('EntertainmentArrivalsBundle:Gallery');    
       
        $limit = 3; 
        $images = $repository->findBy(
                        array('eventId' => $eventId),
                        array('position' => 'DESC'),
                        $limit
                    );
       
       if (!$eventId) {
           throw $this->createNotFoundException(
               'No event id found '.$eventId
           );
       }
       
       return $this->render(
            'EntertainmentRedCarpetBundle:Event:dashboard.html.twig',
            array('event' => $event, 'images' => $images)           
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

          
            $eventName = $request->request->get('event-name');
            $eventShortName = str_replace(' ', '_', $eventName);
            
            $event->setEventState($request->request->get('site-state'));
            $event->setEventName($eventName);
            $event->setEventShortName($eventShortName);
            $event->setIsArrivals($request->request->get('arrivals'));
            $event->setIsGuideToStars($request->request->get('gts'));
            $event->setIsBrackets($request->request->get('brackets'));
            $event->setPackageId($request->request->get('general-pid'));
            $event->setArrivalsVideo($request->request->get('arrivals-video'));
            $event->setArrivalsGallery($request->request->get('arrivals-gallery'));
            $event->setExternalContent($request->request->get('external-content'));
            $event->setEditorialContent($request->request->get('editorial-content'));
            $event->setMostRecent($request->request->get('most-recent'));
            
            
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'Success. Event Config Updated');
            
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
