<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Session\Session;

use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSstar;

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
        
        $repository = $this->getDoctrine()
             ->getRepository('EntertainmentGuideToTheStarsBundle:GTSstar');
        
        $stars = $repository->findAll();
        
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
      
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $star = new GTSstar();
            $star->setStarName($request->request->get('star-name'));
            $star->setStarDescription($request->request->get('star-description'));
                        
            ## Handle uploaded Files
            $tmpImageBubble = $request->files->get('star-bubble');
            $tmpImageLarge = $request->files->get('star-large');
            $bubbleFileName = $_FILES['star-bubble']['name'];
            $largeFileName = $_FILES['star-large']['name'];
            $basePath = $this->get('kernel')->getRootDir();
           
            move_uploaded_file($tmpImageBubble, $basePath."/gts-images/".$bubbleFileName);
            move_uploaded_file($tmpImageLarge, $basePath."/gts-images/".$largeFileName);
            $star->setImageBubbleName($bubbleFileName);
            $star->setImageLargeName($largeFileName);
            $em->persist($star);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'Success! The star has been created.');
            
            ## get the ID that was just inserted    
            $starId = $star->getId(); 
            
            $categories = $request->request->get('category-check');
            if(isset($categories)) {
                foreach($categories as $key => $categoryId) {
                    $conn = $this->get('database_connection');
                    ## JOIN TABLE INSERT
                    $sql = " 
                        INSERT INTO star_category
                        VALUES(" . $starId . ", " . $categoryId . ")" 
                        ;
                    $numRowsEffected = $conn->exec($sql);  
                }
            }
        }
          
        $event = $this->getDoctrine()
           ->getRepository('EntertainmentRedCarpetBundle:Event')
           ->find($eventId);
        
        ## get all categories that are associated with the event
        $categories = $event->getCategory();
        
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:create.html.twig',
            array('event' => $event, 'categories' => $categories)
        );
            
    }
    
     /**
     * @Route("/stars/{eventId}update/{starId}")
     */
    public function updateAction($eventId, $starId)
    {
        
        $event = $this->getDoctrine()
        ->getRepository('EntertainmentRedCarpetBundle:Event')
        ->find($eventId);
        
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            
        }
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:udpate.html.twig',
            array('event' => $event)
        );
        
    }
    
    /**
    * @Route("/stars/{eventId}/content/{starId}")
    */
    public function addContentAction($eventId, $starId) {
         $event = $this->getDoctrine()
            ->getRepository('EntertainmentRedCarpetBundle:Event')
            ->find($eventId);
        
        $star = $this->getDoctrine()
             ->getRepository('EntertainmentGuideToTheStarsBundle:GTSstar')
             ->find(array('id' => $starId));
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:content.html.twig',
            array('event' => $event, 'star' => $star)
        );
        
    }
}
