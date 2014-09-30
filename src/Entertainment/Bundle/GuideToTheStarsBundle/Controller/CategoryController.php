<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Session\Session;

use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTScategory;


class CategoryController extends Controller
{
    
    /**
    * @Route("/stars/category/index/{eventId}")
    * @Template()
    */
    public function indexAction($eventId)
    {
        
        $event = $this->getDoctrine()
            ->getRepository('EntertainmentRedCarpetBundle:Event')
            ->find($eventId);
         
        $categoryRepo = $this->getDoctrine()
            ->getRepository('EntertainmentGuideToTheStarsBundle:GTScategory');
        
        $categories = $categoryRepo->findBy(
                        array('eventId' => $eventId));
            
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Category:index.html.twig',
            array('event' => $event, 'categories' => $categories)
        );
    }
     
    /**
     * @Route("/stars/category/create/{eventId}")
     * @Template()
     */
    public function createAction($eventId)
    {
        
        $event = $this->getDoctrine()
        ->getRepository('EntertainmentRedCarpetBundle:Event')
        ->find($eventId);
        
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
           
            $category = new GTScategory();
     
            $categoryName = $request->request->get('category-name');
            $category->setEvent($event);
            $category->setCategoryName($categoryName);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();  
            $session = new Session();
            $session->getFlashBag()->add('notice', 'Success! The category has been created.');
            
        }
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Category:create.html.twig',
            array('event' => $event)
        );
    }

    /**
     * @Route("/stars/{eventId}/category/{categoryId}/update")
     * @Template()
     */
     
    public function updateAction($eventId, $categoryId)
    {
           
       return $this->render(
            'EntertainmentGuideToTheStarsBundle:Category:update.html.twig',
            array('events' => $events)
        );
    }

}
