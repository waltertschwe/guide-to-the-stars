<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Session\Session;

use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSstar;
use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSvideo;
use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSimage;
use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSquote;
use Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSfunfact;


class JsonController extends Controller
{
    
    /**
     * @Route("/stars/json/desktop")
     * @Template()
    */

    public function desktopJsonAction () {
        $name = array('foo' => 'bar');
        $response = new Response(json_encode(array('name' => $name)));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    
    
    /**
     * @Route("/stars/json/mobile/categories")
     * @Template()
    */

    public function mobileJsonAction () {
        ## all categories names w/star name and small image FIRST Category
        $name = array('foo' => 'bar');
        $response = new Response(json_encode(array('name' => $name)));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    
    
    /**
     * @Route("/stars/json/")
     * @Template()
    */

    public function starJsonAction () {
         ## category feed w/ star name and small image
        $name = array('foo' => 'bar');
        $response = new Response(json_encode(array('name' => $name)));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    
      /**
     * @Route("/stars/json/")
     * @Template()
    */

    public function starJsonAction () {
        ## all star info w/content
        $name = array('foo' => 'bar');
        $response = new Response(json_encode(array('name' => $name)));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    
}
