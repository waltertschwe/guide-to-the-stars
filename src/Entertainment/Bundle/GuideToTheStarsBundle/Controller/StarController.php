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
        
        $repository = $this->getDoctrine()
             ->getRepository('EntertainmentGuideToTheStarsBundle:GTSstar');
        
        $stars = $repository->findAll();
        
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
                                    
            ## Handle uploaded Files
            $tmpImageBubble = $request->files->get('star-bubble');
            $tmpImageLarge = $request->files->get('star-large');
            $bubbleFileName = $_FILES['star-bubble']['name'];
            $largeFileName = $_FILES['star-large']['name'];
            $basePath = $this->get('kernel')->getRootDir();
           
            move_uploaded_file($tmpImageBubble, $basePath."/gts-images/".$bubbleFileName);
            move_uploaded_file($tmpImageLarge, $basePath."/gts-images/".$largeFileName);
            $star->setImageBubbleName($bubbleFileName);
            $star->setImageLargeName($largeFileName);
            $em->persist($star);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'Success! The star has been created.');
            
            ## get the ID that was just inserted    
            $starId = $star->getId(); 
            
            $categories = $request->request->get('category-check');
            if(isset($categories)) {
                foreach($categories as $key => $categoryId) {
                    $conn = $this->get('database_connection');
                    ## JOIN TABLE INSERT
                    $sql = " 
                        INSERT INTO star_category
                        VALUES(" . $starId . ", " . $categoryId . ")" 
                        ;
                    $numRowsEffected = $conn->exec($sql);  
                }
            }
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
     * @Route("/stars/{eventId}/update/{starId}")
     */
    public function updateAction($eventId, $starId)
    {
        
        $event = $this->getDoctrine()
            ->getRepository('EntertainmentRedCarpetBundle:Event')
            ->find($eventId);
            
        $categories = $this->getDoctrine()
            ->getRepository('EntertainmentGuideToTheStarsBundle:GTScategory')
            ->findBy(array('eventId' => $eventId));
            
        $star = $this->getDoctrine()
            ->getRepository('EntertainmentGuideToTheStarsBundle:GTSstar')
            ->find(array('id' => $starId));
       
        ## TODO: put in model
        $conn = $this->get('database_connection');
        $sql = " 
            SELECT category_id
            FROM star_category 
            WHERE star_id = " . $starId  
            ;
        
        $dbCategories= $conn->fetchAll($sql);
        $selectedCategories = array();
        foreach ($dbCategories as $category) {
            $val = $category['category_id'];
            array_push($selectedCategories, $val);    
        }
       
        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $star->setStarName($request->request->get('star-name'));
            $star->setStarDescription($request->request->get('star-description'));
            $getCategories = $request->request->get('category-check');
            
            if(isset($getCategories)) {
                ## delete old categories
                $sql = " 
                        DELETE FROM star_category
                        WHERE star_id = " . $starId;
                $numRowsEffected = $conn->exec($sql);
                
                ## add new categories from updated form
                foreach($getCategories as $key => $categoryId) {
                    $conn = $this->get('database_connection');
                    $sql = " 
                        INSERT INTO star_category
                        VALUES(" . $starId . ", " . $categoryId . ")" 
                        ;
                    $numRowsEffected = $conn->exec($sql);  
                } 
            }
          
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'Success! The star information has been updated.');
            
            ## query for updated categories
            $conn = $this->get('database_connection');
            $sql = " 
                SELECT category_id
                FROM star_category 
                WHERE star_id = " . $starId  
                ;
            $dbCategories= $conn->fetchAll($sql);
            $selectedCategories = array();
            foreach ($dbCategories as $category) {
                $val = $category['category_id'];
                array_push($selectedCategories, $val); 
            }
        }

        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:update.html.twig',
            array('event' => $event, 'categories' => $categories, 'star' => $star, 'selectedcat' => $selectedCategories)
        );
        
    }
    
    /**
    * @Route("/stars/{eventId}/content/{starId}")
    */
    public function addContentAction($eventId, $starId) {
        $event = $this->getDoctrine()
            ->getRepository('EntertainmentRedCarpetBundle:Event')
            ->find($eventId);
        
        $star = $this->getDoctrine()
             ->getRepository('EntertainmentGuideToTheStarsBundle:GTSstar')
             ->find(array('id' => $starId));
        
        $position = $this->nextPosition($starId);
       
        $request = $this->get('request');
        
        if ($request->isMethod('POST')) {
            
            $isOrder = $request->request->get('form-order-stars');
            if($isOrder) {
                
  
  
  
            } else {
               
                $contentType = $request->request->get('submit');
                $em = $this->getDoctrine()->getManager();
                switch ($contentType) {
                    case 'video-submit':
                        $asset = new GTSvideo();
                        $videoId = $request->request->get('video-id');
                        $videoEmbed = $request->request->get('video-embed');
                      
                        $asset->setVideoId($videoId);
                        $asset->setVideoEmbed($videoEmbed);
                       
                        break;
                    case 'image-submit':
                        $asset = new GTSimage();
                        $title = $request->request->get('image-title');
                        $url = $request->request->get('image-url');
                        $caption = $request->request->get('image-caption');
                        $credit = $request->request->get('image-credit');
                        
                        ## image asset
                        $tmpFileName = $request->files->get('image-name');
                        $userFileName = $_FILES['image-name']['name'];
                        $basePath = $this->get('kernel')->getRootDir();
                        move_uploaded_file($tmpFileName, $basePath."/event-images/".$userFileName);
                      
                        $asset->setImageTitle($title);
                        $asset->setImageName($userFileName);
                        $asset->setImageUrl($url);
                        $asset->setImageCaption($caption);
                        $asset->setImageCredit($credit);
                
                        break;
                    case 'quote-submit':
                        $asset = new GTSquote();
                        $credit = $request->request->get('quote-credit');
                        $quote = $request->request->get('quote');
                        
                        ## image asset
                        $tmpFileName = $request->files->get('quote-image');
                        $userFileName = $_FILES['quote-image']['name'];
                        $basePath = $this->get('kernel')->getRootDir();
                        move_uploaded_file($tmpFileName, $basePath."/event-images/".$userFileName);
                        
                        $asset->setQuoteCredit($credit);
                        $asset->setQuoteText($quote);
                        $asset->setQuoteImage($userFileName);
                       
                        break;
                    case 'fact-submit':
                        $asset = new GTSfunfact();
                        $fact = $request->request->get('fact-content');
                        $asset->setFunFact($fact);
                        break;  
                }
                
                $asset->setTitle($request->request->get('title'));
                $asset->setType($request->request->get('type'));
                $asset->setStar($star);
                $asset->setPosition($position);
                $em->persist($asset);
                $em->flush();
               
            }    
             
        }
        
        $videos = $star->getGtsVideos();
        $images = $star->getGtsImages();
        $facts = $star->getGtsFacts();
        $quotes = $star->getGtsQuotes();
        
        $assets = array();
        
        foreach($videos as $video) {
            $position = $video->getPosition();
            $assets[$position] = $video;
        }
        
        foreach($images as $image) {
            $position = $image->getPosition();
            $assets[$position] = $image;
        }
        
        foreach($facts as $fact) {
            $position = $fact->getPosition();
            $assets[$position] = $fact;
        }
        
        foreach($quotes as $quote) {
            $position = $quote->getPosition();
            $assets[$position] = $quote;
        }
        
        krsort($assets);
         
        return $this->render(
            'EntertainmentGuideToTheStarsBundle:Star:content.html.twig',
            array('event' => $event, 'star' => $star, 'assets' => $assets)
        );
        
    }

   /**
     * @Route("/stars/ajax-order")
     * @Template()
     */
    public function ajaxOrderAction() 
    {
        $logger = $this->get('logger');
        $logger->info("I AM HERE IN AJAXPOSITION ACTION");
        
        $orderArray = $_REQUEST['starsArr'];
        $totalPositions = count($orderArray);
        $logger->info(var_export($orderArray, true));
        
        $em = $this->getDoctrine()->getManager();
        
        foreach($orderArray as $key => $value) {
            $logger->info("Content Data = " . $value);
            $data = explode("_", $value);
            $contentType = $data[0];
            $contentId = $data[1];
            
            $logger->info("Content Type = " . $contentType);
            $logger->info("Content Id = " . $contentId);
           
            switch ($contentType) {
              case "video":
                  $asset = $this->getDoctrine()
                    ->getRepository('EntertainmentGuideToTheStarsBundle:GTSvideo')
                    ->find($contentId);
                
                  break;
              case "quote":
                  $asset = $this->getDoctrine()
                    ->getRepository('EntertainmentGuideToTheStarsBundle:GTSquote')
                    ->find($contentId);
                
                  break;
              case "image":
                  $asset = $this->getDoctrine()
                    ->getRepository('EntertainmentGuideToTheStarsBundle:GTSimage')
                    ->find($contentId);
                   break;
              case "fact":
                  $asset = $this->getDoctrine()
                    ->getRepository('EntertainmentGuideToTheStarsBundle:GTSfunfact')
                    ->find($contentId);
                   break;      
               
            }
            
            $asset->setPosition($totalPositions);
            $em->flush();
            $totalPositions--;
       
            
        }
        
        
        /*        $data = $_POST;
          
        if($data) {
           $logger->info("I HAVE DATA");
           $logger->info("DATA COUNT = " . $dataLength);
           $logger->info(var_export($data, true));
        } else {
           $logger->info("NO DATA"); 
        }
         */
      
        /*    
            $em = $this->getDoctrine()->getManager();
            
            
            foreach($data as $eventId => $imageIds) {
                $logger->info("eventId = " . $eventId);
                $totalImages = count($imageIds);
                $logger->info("total image ids = " . $totalImages);
                foreach($imageIds as $imageId) {
                     
                    $image = $em->getRepository('EntertainmentArrivalsBundle:Gallery')
                                ->find(array ('eventId' => $eventId,  
                                              'id' => $imageId));
                   
                    $image->setPosition($totalImages);
                    $logger->info("IMAGE OBJECT = " . var_export($image, true));
                    $totalImages--;
                    $em->flush();
                    
                }
            }
            */
       // }

        //$session = new Session();
       // $session->getFlashBag()->add('notice', 'Success! The Arrivlas ordering has been updated.');
       
        return new Response("positions updated");
    }
    


    public function nextPosition($starId) 
    {
         
         ## Refactor to one query
         $conn = $this->get('database_connection');
         $sql = "SELECT COUNT(*) AS videoTotal FROM GTSvideo WHERE star_id = " . $starId;
         $videoArr = $conn->fetchAll($sql);
         $videoTotal = $videoArr[0]['videoTotal'];
         
         $sql = "SELECT COUNT(*) AS quoteTotal FROM GTSquote WHERE star_id = " . $starId;
         $quoteArr = $conn->fetchAll($sql);
         $quoteTotal = $quoteArr[0]['quoteTotal'];
         
         $sql = "SELECT COUNT(*) AS factTotal FROM GTSfunfact WHERE star_id = " . $starId;
         $factArr = $conn->fetchAll($sql);
         $factTotal = $factArr[0]['factTotal'];
         
         $sql = "SELECT COUNT(*) AS imageTotal FROM GTSimage WHERE star_id = " . $starId;
         $imageArr = $conn->fetchAll($sql);
         $imageTotal = $imageArr[0]['imageTotal'];
       
         $totalAssets = $videoTotal + $quoteTotal + $factTotal + $imageTotal;
         $position = $totalAssets + 1;
        
         /*
         echo "videoTotal = " . $videoTotal;
         echo "<br/>quoteTotal = " . $quoteTotal;
         echo "<br/>fact Total = " . $factTotal;
         echo "<br/>imageTotal = " . $imageTotal;
         echo "<br/>totalAssets = " . $totalAssets;
         echo "<br/>position = " . $position;
        */
         
         return $position;
         
    }
}
