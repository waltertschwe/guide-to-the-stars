<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Session\Session;

use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSstar;
use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSvideo;
use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSimage;
use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSquote;
use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSfunfact;

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
     * @Route("/stars/{eventId}/update/{starId}")
     */
    public function updateAction($eventId, $starId)
    {
        
        $event = $this->getDoctrine()
            ->getRepository('EntertainmentRedCarpetBundle:Event')
            ->find($eventId);
            
        $categories = $this->getDoctrine()
            ->getRepository('EntertainmentGuideToTheStarsBundle:GTScategory')
            ->findBy(array('eventId' => $eventId));
            
        $star = $this->getDoctrine()
            ->getRepository('EntertainmentGuideToTheStarsBundle:GTSstar')
            ->find(array('id' => $starId));
       
        ## TODO: put in model
        $conn = $this->get('database_connection');
        $sql = " 
            SELECT category_id
            FROM star_category 
            WHERE star_id = " . $starId  
            ;
        
        $dbCategories= $conn->fetchAll($sql);
        $selectedCategories = array();
        foreach ($dbCategories as $category) {
            $val = $category['category_id'];
            array_push($selectedCategories, $val);    
        }
       
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $star->setStarName($request->request->get('star-name'));
            $star->setStarDescription($request->request->get('star-description'));
            $getCategories = $request->request->get('category-check');
            
            if(isset($getCategories)) {
                ## delete old categories
                $sql = " 
                        DELETE FROM star_category
                        WHERE star_id = " . $starId;
                $numRowsEffected = $conn->exec($sql);
                
                ## add new categories from updated form
                foreach($getCategories as $key => $categoryId) {
                    $conn = $this->get('database_connection');
                    $sql = " 
                        INSERT INTO star_category
                        VALUES(" . $starId . ", " . $categoryId . ")" 
                        ;
                    $numRowsEffected = $conn->exec($sql);  
                } 
            }
          
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'Success! The star information has been updated.');
            
            ## query for updated categories
            $conn = $this->get('database_connection');
            $sql = " 
                SELECT category_id
                FROM star_category 
                WHERE star_id = " . $starId  
                ;
            $dbCategories= $conn->fetchAll($sql);
            $selectedCategories = array();
            foreach ($dbCategories as $category) {
                $val = $category['category_id'];
                array_push($selectedCategories, $val); 
            }
        }

        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:update.html.twig',
            array('event' => $event, 'categories' => $categories, 'star' => $star, 'selectedcat' => $selectedCategories)
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
        
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            $contentType = $request->request->get('submit');
            $em = $this->getDoctrine()->getManager();
            switch ($contentType) {
                case 'video-submit':
                    $asset = new GTSvideo();
                    
                    break;
                case 'image-submit':
                     $asset = new GTSimage();
                    break;
                case 'quote-submit':
                     $asset = new GTSquote();
                    break;
                case 'fact-submit':
                     $asset = new GTSfuncfact();
                    break;  
            }
        }
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:content.html.twig',
            array('event' => $event, 'star' => $star)
        );
        
    }
}
