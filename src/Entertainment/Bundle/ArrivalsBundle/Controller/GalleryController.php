<?php

namespace Entertainment\Bundle\ArrivalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class GalleryController extends Controller
{
    /**
     * @Route("/arrivals/create")
     * @Template()
     */
    public function createAction()
    {
        return array(
                // ...
            );    
    }

}
