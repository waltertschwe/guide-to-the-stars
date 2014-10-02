<?php

namespace Entertainment\Bundle\RedCarpetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Event
{
    
    public function __construct()
    {
        $this->category = new ArrayCollection();
    }
    
    /**
     * @var integer
     *
     * @ORM\Column(name="event_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $event_id;

    /**
    * @ORM\OneToMany(targetEntity="Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTScategory", mappedBy="event")
    */
    protected $category;

    /**
     * @var string
     *
     * @ORM\Column(name="eventName", type="string", length=255)
     */
    private $eventName;

    /**
     * @var string
     *
     * @ORM\Column(name="eventShortName", type="string", length=255)
     */
    private $eventShortName;
    
     /**
     * @var string
     *
     * @ORM\Column(name="event_state", type="string", length=255, nullable=true)
     */
     
    private $eventState;
    
     /**
     * @var boolean
     *
     * @ORM\Column(name="is_app_arrivals", type="boolean", nullable=true)
     */
    private $isArrivals;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_app_gts", type="boolean", nullable=true)
     */
    private $isGuideToStars;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_app_brackets", type="boolean", nullable=true)
     */
    private $isBrackets;
    
     /**
     * @var datetime
     *
     * @ORM\Column(name="date_time", type="datetime", nullable=true)
     */
    
    private $dateTime;
    
      /**
     * @var string
     *
     * @ORM\Column(name="packageId", type="string", length=255, nullable=true)
     */
     private $packageId;
     
      /**
     * @var string
     *
     * @ORM\Column(name="arrivalsVideo", type="string", length=255, nullable=true)
     */
     private $arrivalsVideo;
     
      /**
     * @var string
     *
     * @ORM\Column(name="arrivalsGallery", type="string", length=255, nullable=true)
     */
     private $arrivalsGallery;
     
      /**
     * @var string
     *
     * @ORM\Column(name="externalContent", type="string", length=255, nullable=true)
     */
     private $externalContent;
     
       /**
     * @var string
     *
     * @ORM\Column(name="editorialContent", type="string", length=255, nullable=true)
     */
     private $editorialContent;
     
       /**
     * @var string
     *
     * @ORM\Column(name="mostRecent", type="string", length=255, nullable=true)
     */
     private $mostRecent;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->event_id;
    }

    /**
     * Set eventName
     *
     * @param string $eventName
     * @return Event
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;

        return $this;
    }

    /**
     * Get eventName
     *
     * @return string 
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Set eventShortName
     *
     * @param string $eventShortName
     * @return Event
     */
    public function setEventShortName($eventShortName)
    {
        $this->eventShortName = $eventShortName;

        return $this;
    }

    /**
     * Get eventShortName
     *
     * @return string 
     */
    public function getEventShortName()
    {
        return $this->eventShortName;
    }


    /**
     * Get event_id
     *
     * @return integer 
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Set isArrivals
     *
     * @param boolean $isArrivals
     * @return Event
     */
    public function setIsArrivals($isArrivals)
    {
        $this->isArrivals = $isArrivals;

        return $this;
    }

    /**
     * Get isArrivals
     *
     * @return boolean 
     */
    public function getIsArrivals()
    {
        return $this->isArrivals;
    }

    /**
     * Set isGuideToStars
     *
     * @param boolean $isGuideToStars
     * @return Event
     */
    public function setIsGuideToStars($isGuideToStars)
    {
        $this->isGuideToStars = $isGuideToStars;

        return $this;
    }

    /**
     * Get isGuideToStars
     *
     * @return boolean 
     */
    public function getIsGuideToStars()
    {
        return $this->isGuideToStars;
    }

    /**
     * Set isBrackets
     *
     * @param boolean $isBrackets
     * @return Event
     */
    public function setIsBrackets($isBrackets)
    {
        $this->isBrackets = $isBrackets;

        return $this;
    }

    /**
     * Get isBrackets
     *
     * @return boolean 
     */
    public function getIsBrackets()
    {
        return $this->isBrackets;
    }

    /**
     * Set eventState
     *
     * @param string $eventState
     * @return Event
     */
    public function setEventState($eventState)
    {
        $this->eventState = $eventState;

        return $this;
    }

    /**
     * Get eventState
     *
     * @return string 
     */
    public function getEventState()
    {
        return $this->eventState;
    }

    /**
     * Set dateTime
     *
     * @param \DateTime $dateTime
     * @return Event
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime 
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set packageId
     *
     * @param string $packageId
     * @return Event
     */
    public function setPackageId($packageId)
    {
        $this->packageId = $packageId;

        return $this;
    }

    /**
     * Get packageId
     *
     * @return string 
     */
    public function getPackageId()
    {
        return $this->packageId;
    }

    /**
     * Set arrivalsVideo
     *
     * @param string $arrivalsVideo
     * @return Event
     */
    public function setArrivalsVideo($arrivalsVideo)
    {
        $this->arrivalsVideo = $arrivalsVideo;

        return $this;
    }

    /**
     * Get arrivalsVideo
     *
     * @return string 
     */
    public function getArrivalsVideo()
    {
        return $this->arrivalsVideo;
    }

    /**
     * Set arrivalsGallery
     *
     * @param string $arrivalsGallery
     * @return Event
     */
    public function setArrivalsGallery($arrivalsGallery)
    {
        $this->arrivalsGallery = $arrivalsGallery;

        return $this;
    }

    /**
     * Get arrivalsGallery
     *
     * @return string 
     */
    public function getArrivalsGallery()
    {
        return $this->arrivalsGallery;
    }

    /**
     * Set externalContent
     *
     * @param string $externalContent
     * @return Event
     */
    public function setExternalContent($externalContent)
    {
        $this->externalContent = $externalContent;

        return $this;
    }

    /**
     * Get externalContent
     *
     * @return string 
     */
    public function getExternalContent()
    {
        return $this->externalContent;
    }

    /**
     * Set editorialContent
     *
     * @param string $editorialContent
     * @return Event
     */
    public function setEditorialContent($editorialContent)
    {
        $this->editorialContent = $editorialContent;

        return $this;
    }

    /**
     * Get editorialContent
     *
     * @return string 
     */
    public function getEditorialContent()
    {
        return $this->editorialContent;
    }

    /**
     * Set mostRecent
     *
     * @param string $mostRecent
     * @return Event
     */
    public function setMostRecent($mostRecent)
    {
        $this->mostRecent = $mostRecent;

        return $this;
    }

    /**
     * Get mostRecent
     *
     * @return string 
     */
    public function getMostRecent()
    {
        return $this->mostRecent;
    }

    /**
     * Add category
     *
     * @param \Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTScategory $category
     * @return Event
     */
    public function addCategory(\Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTScategory $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTScategory $category
     */
    public function removeCategory(\Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTScategory $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
