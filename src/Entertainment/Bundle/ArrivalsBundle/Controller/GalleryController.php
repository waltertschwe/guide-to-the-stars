<?php

namespace Entertainment\Bundle\ArrivalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Entertainment\Bundle\ArrivalsBundle\Entity\Gallery;

class GalleryController extends Controller
{
    /**
     * @Route("/arrivals/{eventId}/create")
     * @Template()
     */
    public function createAction($eventId)
    {
        
        $event = $this->getDoctrine()
        ->getRepository('EntertainmentRedCarpetBundle:Event')
        ->find($eventId);
       
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            $eventId = $request->request->get('event-id');
            $title = $request->request->get('title');
            $credit = $request->request->get('credit');
            $tmpFileName = $request->files->get('arrival-image');
            $userFileName = $_FILES['arrival-image']['name'];
            $basePath = $this->get('kernel')->getRootDir();
           
            move_uploaded_file($tmpFileName, $basePath."/event-images/".$userFileName);
            
            $image = new Gallery();
            
            $conn = $this->get('database_connection');
            $sql = " 
                SELECT count(*) as count
                FROM Gallery 
                WHERE event_id = " . $eventId  
                ;
            
            $dbGalleryCount= $conn->fetchAll($sql);
            $galleryCount = $dbGalleryCount[0]['count'];
            $positionCount = ++$galleryCount;
          
            $image->setEvent($event);
            $image->setEventId($eventId);
            $image->setTitle($title);
            $image->setCredit($credit);
            $image->setImageName($userFileName);
            $image->setPosition($positionCount);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
        }
        
        
        return $this->render(
            'EntertainmentArrivalsBundle:Gallery:create.html.twig',
            array ('event' => $event)
        );
    }
    
    /**
     * @Route("/arrivals/{eventId}/position")
     * @Template()
     */
    public function positionAction($eventId)
    {
                
          $logger = $this->get('logger');
          
          $repository = $this->getDoctrine()
              ->getRepository('EntertainmentArrivalsBundle:Gallery');
          
          $images = $repository->findBy(
                        array('eventId' => $eventId),
                        array('position' => 'DESC')
                    );
                    
          $request = $this->get('request');
          
          if ($request->isMethod('POST')) {
              $logger->info("POSTITION POST = " . var_dump($request)); 
          }
         
          return $this->render(
              'EntertainmentArrivalsBundle:Gallery:position.html.twig',
              array('images' => $images)
          );
    }

     /**
     * @Route("/arrivals/ajax-position")
     * @Template()
     */
    public function ajaxPositionAction(Request $request) 
    {
            
        $logger = $this->get('logger');
        $logger->info("AJAX Request : About to Re-Order Gallery Positions ");
        $data = $request->request->get('request');
        $logger->info("POST DATA = " . var_dump($data));
        
        $testArray = array("foo" => "bar");
        $logger->info("test log" . print_r($testArray));
        
        if ($request->isMethod('POST')) {
            
        }
        
        return new Response('Hello');
    }
    
    
    /**
     * @Route("/rest/arrivals/{$eventId}")
     * @Template()
     */
    public function arrivalsGetAction($eventId) 
    {
                
        $results = array();
        $results['feed_id'] = 1;
        $results['feed_name'] = "arrivalsFeed";
        $results['photos'][0]['title'] = 'Beyonce';
        $results['photos'][1]['title'] = 'JayZ';
        
        
                
        $repository = $this->getDoctrine()
              ->getRepository('EntertainmentArrivalsBundle:Gallery');    
        
        $images = $repository->findBy(
                        array('eventId' => $eventId),
                        array('position' => 'DESC')
                    );
        
        
        $response = new Response();
         //$response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($results));
       
        
        return $response;
    }

}
