<?php

namespace Entertainment\Bundle\ArrivalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class GalleryController extends Controller
{
    /**
     * @Route("/arrivals/{eventId}/create")
     * @Template()
     */
    public function createAction($eventId)
    {
          return $this->render(
              'EntertainmentArrivalsBundle:Gallery:create.html.twig'
          );
    }
    
    /**
     * @Route("/arrivals/{eventId}/position")
     * @Template()
     */
    public function positionAction($eventId)
    {
          return $this->render(
              'EntertainmentArrivalsBundle:Gallery:position.html.twig'
          );
    }

}
