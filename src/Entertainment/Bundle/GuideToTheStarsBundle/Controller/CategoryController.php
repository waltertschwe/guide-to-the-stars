<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CategoryController extends Controller
{
    
     /**
     * @Route("/stars/category/index/{eventId}")
     * @Template()
     */
    public function indexAction()
    {
         return $this->render(
            'EntertainmentGuideToTheStarsBundle:Category:index.html.twig',
            array('events' => $events)
        );
    }
    
    
    
    /**
     * @Route("/stars/category/create/{eventId}")
     * @Template()
     */
    public function createAction()
    {
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Category:create.html.twig',
            array('events' => $events)
        );
    }

    /**
     * @Route("/stars/{eventId}/category/{categoryId}/update")
     * @Template()
     */
    public function updateAction()
    {
           
       return $this->render(
            'EntertainmentGuideToTheStarsBundle:Category:update.html.twig',
            array('events' => $events)
        );
    }

}
