<?php

namespace Entertainment\Bundle\ArrivalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Entertainment\Bundle\ArrivalsBundle\Entity\Gallery;

class GalleryController extends Controller
{
    /**
     * @Route("/arrivals/{eventId}/create")
     * @Template()
     */
    public function createAction($eventId)
    {
        
        //$event = array();
        $event = $this->getDoctrine()
        ->getRepository('EntertainmentRedCarpetBundle:Event')
        ->find($eventId);
        //$event['eventId'] = $eventId;
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            $eventId = $request->request->get('event-id');
            $title = $request->request->get('title');
            $credit = $request->request->get('credit');
            $tmpFileName = $request->files->get('arrival-image');
            $fileName = $request->files->getAlnum('arrival-image');
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
          return $this->render(
              'EntertainmentArrivalsBundle:Gallery:position.html.twig'
          );
    }

}
