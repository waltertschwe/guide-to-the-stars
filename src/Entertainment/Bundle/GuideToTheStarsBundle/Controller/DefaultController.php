<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use Entertainment\Bundle\GuideToTheStarsBundle\Entity\Test;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
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
    
     /**
    * @Route("/events/test-insert")
    */
    public function testInsertAction()
    {
      
        $event = new Test();
        
        $event->setTestName('Oscars 20125');
      
        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();

        return new Response('Created event id = '.$event->getId());
       
    } 
    
   
    
}
