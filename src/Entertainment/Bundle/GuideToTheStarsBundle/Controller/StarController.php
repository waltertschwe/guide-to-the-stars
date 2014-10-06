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
                echo " key =  " . $key;
                echo "<br/> value = " . $categoryId;
                
                $conn = $this->get('database_connection');
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
           
            
              
            exit();
            
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
     * @Route("/stars/updateAction")
     */
    public function updateAction($starId)
    {
        
    }
    
    
}
