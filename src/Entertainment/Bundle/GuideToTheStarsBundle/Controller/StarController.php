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
        
        $stars = array();
        
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
                
            $categories = $request->request->get('category-check');
            foreach($categories as $key => $value) {
                $catRepo = $this->getDoctrine()
                    ->getRepository('EntertainmentGuideToTheBundle:Gallery');    
        
                //$category = $catRepo->findBy(
                  
                //$star = $this->getDoct
                $category->addStar($star);
                $em->persist($category);
                $em->flush();
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
