<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
            $em->persist($star);
            $em->flush();
            
            $starId = $star->getId(); 
            
            $categories = $request->request->get('category-check');
            foreach($categories as $key => $categoryId) {
                $conn = $this->get('database_connection');
                
                ## JOIN TABLE INSERT
                $sql = " 
                    INSERT INTO star_category
                    VALUES(" . $starId . ", " . $categoryId . ")" 
                    ;
                $numRowsEffected = $conn->exec($sql);
                
                /*
                $catRepo = $this->getDoctrine()
                    ->getRepository('EntertainmentGuideToTheStarsBundle:GTScategory');    
        
                $category = $catRepo->findBy(
                                        array('id' => $value)
                                     );
                 //var_dump($category);
                // exit(); 
                  
               $star->addCategory($category);
                 */
               
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
        
    }
    
    /**
    * @Route("/stars/{eventId}/content/{starId}")
    */
    public function addContentAction($eventId, $starId) {
         $event = $this->getDoctrine()
            ->getRepository('EntertainmentRedCarpetBundle:Event')
            ->find($eventId);
        
        $repository = $this->getDoctrine()
             ->getRepository('EntertainmentGuideToTheStarsBundle:GTSstar');
        
        $star = $repository->findBy(
                                 array('id' => $starId));
        
         return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:content.html.twig',
            array('event' => $event, 'star' => $star)
        );
        
    }
}
