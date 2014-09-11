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
    
    /**
     * @var integer
     *
     * @ORM\Column(name="event_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $event_id;

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
}
