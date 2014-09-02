<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller
{
    
    /**
     * @Route("/events/index")
     */
    public function indexAction()
    {
         $data = array();
        
         return $this->render(
            'EntertainmentGuideToTheStarsBundle:Events:index.html.twig',
            array('data' => $data)
        );
    }
    
    
    /**
     * @Route("/events/create")
     */
    public function createAction() {
        
        return new Response('Create');
    }
    
    /**
     * @Route("/events/update")
     */
    public function updateAction() {
        
        return new Response('Create');
    }
    
    
    /**
     * @Route("/events/test")
     */
    public function testAction()
    {
        $limit = 5;
        $number = rand(1, $limit);

        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Events:test.html.twig',
            array('number' => $number)
        );
    }
    
    
}
