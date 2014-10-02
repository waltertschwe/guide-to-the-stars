<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GTScategory
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GTScategory
{
    
    public function __construct() {
        $this->stars = new ArrayCollection();
    }
    
    /**
    * @ORM\ManyToOne(targetEntity="Entertainment\Bundle\RedCarpetBundle\Entity\Event", inversedBy="category")
    * @ORM\JoinColumn(name="event_id", referencedColumnName="event_id")
    */
    
    private $event;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
    * @var integer
    *
    * @ORM\Column(name="event_id", type="integer")
    */
     private $eventId;

    /**
     * @var string
     *
     * @ORM\Column(name="category_name", type="string", length=255)
     */
    private $categoryName;

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
     * Set eventId
     *
     * @param integer $eventId
     * @return GTScategory
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;

        return $this;
    }

    /**
     * Get eventId
     *
     * @return integer 
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Set categoryName
     *
     * @param string $categoryName
     * @return GTScategory
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set event
     *
     * @param \Entertainment\Bundle\RedCarpetBundle\Entity\Event $event
     * @return GTScategory
     */
    public function setEvent(\Entertainment\Bundle\RedCarpetBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Entertainment\Bundle\RedCarpetBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}
