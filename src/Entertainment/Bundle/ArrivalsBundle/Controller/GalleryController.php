<?php

namespace Entertainment\Bundle\ArrivalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;

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
            
            ## TODO: put in model
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
            $session = new Session();
            $session->getFlashBag()->add('notice', 'Success! Arrival created.');
           
        }

        $imageRepository = $this->getDoctrine()
              ->getRepository('EntertainmentArrivalsBundle:Gallery');
              
        $images = $imageRepository->findBy(
                     array('eventId' => $eventId),
                     array('position' => 'DESC')
                 );
      
        return $this->render(
            'EntertainmentArrivalsBundle:Gallery:create.html.twig',
            array ('event' => $event, 'images' => $images)
        );
    }

    /**
     * @Route("/arrivals/upload/{arrivalId}")
     * @Template()
    */
    public function updateAction($arrivalId) {
           
       $image = $this->getDoctrine()
        ->getRepository('EntertainmentArrivalsBundle:Gallery')
        ->find($arrivalId);      
       
       $event = $image->getEvent();
       
       $request = $this->get('request');
       if ($request->isMethod('POST')) {
           
           $em = $this->getDoctrine()->getManager();
           $title = $request->request->get('title');
           $credit = $request->request->get('credit');
           
           $image->setTitle($title);
           $image->setCredit($credit);
           $em->flush();
           $session = new Session();
           $session->getFlashBag()->add('notice', 'Your Image Info has been updated.');
           
       }
                        
       return $this->render(
            'EntertainmentArrivalsBundle:Gallery:update.html.twig',
            array ('image' => $image, 'event' => $event)
        );             
                  
    }

    /**
     * @Route("/arrivals/{eventId}/position")
     * @Template()
     */
    public function positionAction($eventId)
    {
                
        $logger = $this->get('logger');
          
        $imageRepository = $this->getDoctrine()
              ->getRepository('EntertainmentArrivalsBundle:Gallery');
          
        $images = $imageRepository->findBy(
                      array('eventId' => $eventId),
                      array('position' => 'DESC')
                  );
          
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('EntertainmentRedCarpetBundle:Event')->find($eventId);
                
        return $this->render(
            'EntertainmentArrivalsBundle:Gallery:position.html.twig',
            array('images' => $images, 'event' => $event)
        );
    }

     /**
     * @Route("/arrivals/ajax-position")
     * @Template()
     */
    public function ajaxPositionAction() 
    {
        
        $data = $_POST;
        if($data) {
            $logger = $this->get('logger');
           
            
            $logger->info("I AM HERE IN AJAXPOSITION ACTION");
            $logger->info(var_export($data, true));
            
            $em = $this->getDoctrine()->getManager();
            //$repository = $this->getDoctrine()
            //  ->getRepository('EntertainmentArrivalsBundle:Gallery');
            
            foreach($data as $eventId => $imageIds) {
                $logger->info("eventId = " . $eventId);
                $totalImages = count($imageIds);
                $logger->info("total image ids = " . $totalImages);
                foreach($imageIds as $imageId) {
                     
                    $image = $em->getRepository('EntertainmentArrivalsBundle:Gallery')
                                ->find(array ('eventId' => $eventId,  
                                              'id' => $imageId));
                   
                    $image->setPosition($totalImages);
                    $logger->info("IMAGE OBJECT = " . var_export($image, true));
                    $totalImages--;
                    $em->flush();
                    
                }
            }
        
        }

        $session = new Session();
        $session->getFlashBag()->add('notice', 'Success! The Arrivlas ordering has been updated.');
       
        return new Response("positions updated");
    }
    
    
    /**
     * @Route("/rest/arrivals/{eventId}")
     * @Template()
     */
    public function arrivalsGetAction($eventId) 
    {
         
        $eventId = 6;       
        $results = array();
        $results['feed_id'] = 1;
        $results['feed_name'] = "arrivalsFeed";                
        $repository = $this->getDoctrine()
              ->getRepository('EntertainmentArrivalsBundle:Gallery');    
        
        $images = $repository->findBy(
                        array('eventId' => $eventId),
                        array('position' => 'DESC')
                    );
        
        $imageCounter = 0;
        foreach($images as $image) {
            $results['photos'][$imageCounter]['title'] = $image->getTitle();
            $results['photos'][$imageCounter]['credit'] = $image->getCredit();
            $results['photos'][$imageCounter]['fullsize']['url'] = $image->getImageName();
            $results['photos'][$imageCounter]['fullsize']['width'] = 350; 
            
            $imageCounter++;
        }
        
        $response = new Response();
        $response->setContent(json_encode($results));
       
        
        return $response;
    }

}
