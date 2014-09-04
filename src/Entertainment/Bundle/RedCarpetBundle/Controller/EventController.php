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
            'RedCarpetBundle:Event:create.html.twig'           
        );
    }
    
    /**
     * @Route("/events/update")
     */
    public function updateAction() {
        
        /*
        $product = $this->getDoctrine()
        ->getRepository('AcmeStoreBundle:Product')
        ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        
        */
        return new Response('Create');
    }
     
}
