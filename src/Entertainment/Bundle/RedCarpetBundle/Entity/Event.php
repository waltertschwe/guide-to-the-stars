<?php

namespace Entertainment\Bundle\RedCarpetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="eventDescription", type="string", length=255)
     */
    private $eventDescription;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
     * Set eventDescription
     *
     * @param string $eventDescription
     * @return Event
     */
    public function setEventDescription($eventDescription)
    {
        $this->eventDescription = $eventDescription;

        return $this;
    }

    /**
     * Get eventDescription
     *
     * @return string 
     */
    public function getEventDescription()
    {
        return $this->eventDescription;
    }
}
