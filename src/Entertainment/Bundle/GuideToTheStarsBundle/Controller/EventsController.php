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
         
         $repository = $this->getDoctrine()
             ->getRepository('EntertainmentGuideToTheStarsBundle:Event');
             
         $events = $repository->findAll();
        
         return $this->render(
            'EntertainmentGuideToTheStarsBundle:Events:index.html.twig',
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
            'EntertainmentGuideToTheStarsBundle:Events:create.html.twig'           
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
