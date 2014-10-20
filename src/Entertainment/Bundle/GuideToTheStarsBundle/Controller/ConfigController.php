<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\HttpFoundation\Response;
use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSconfig;


class ConfigController extends Controller
{
    
    /**
    * @Route("/stars/config/{eventId}")
    * @Template()
    */
    public function indexAction($eventId)
    {
        $event = $this->getDoctrine()
           ->getRepository('EntertainmentRedCarpetBundle:Event')
           ->find($eventId);
         
        $configRepo = $this->getDoctrine()
            ->getRepository('EntertainmentGuideToTheStarsBundle:GTSconfig');
        
        $config = $configRepo->findOneBy(
                       array('eventId' => $eventId));
                       
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            $title = $request->request->get('app-title');
            $appDesc = $request->request->get('app-description');
            $starText = $request->request->get('star-text');
            $categoryText = $request->request->get('category-text');
            
            $config->setEventId($eventId);
            $config->setEvent($event);
            $config->setTitle($title);
            $config->setDescription($appDesc);
            $config->setStarDesc($starText);
            $config->setCategoryDesc($categoryText);
            $em = $this->getDoctrine()->getManager();
            if(empty($config)) {
                ## initial Insert.
                $config = new GTSconfig();
                $em->persist($config);
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('notice', 'Success! Event Configuration created.');
          
            } else {
                ## update existing config data
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('notice', 'Success! Event Configuration updated');
            }
        }
        
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Config:index.html.twig',
                array('event' => $event, 'config' => $config)
        );
    }
         
}       
       