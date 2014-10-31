<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class JsonController extends Controller
{
    
    /**
     * @Route("/stars/json/desktop")
     * @Template()
    */

    public function contentJSONAction () {
        $name = array('foo' => 'bar');
        $response = new Response(json_encode(array('name' => $name)));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    
    
    /**
     * @Route("/stars/json/mobile")
     * @Template()
    */

    public function contentJSONAction () {
        $name = array('foo' => 'bar');
        $response = new Response(json_encode(array('name' => $name)));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    
    
    /**
     * @Route("/stars/json/")
     * @Template()
    */

    public function contentJSONAction () {
        $name = array('foo' => 'bar');
        $response = new Response(json_encode(array('name' => $name)));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    
    
}
