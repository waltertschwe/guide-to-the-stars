<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * GTSconfig
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GTSconfig
{
    
   
    // One to One unidrectional.  Event does not reference the GTS config.  
    /**
    * @ORM\OneToOne(targetEntity="Entertainment\Bundle\RedCarpetBundle\Entity\Event")
    * @ORM\JoinColumn(name="event_id", referencedColumnName="event_id")
    */
    
    private $event;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="gts_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $gtsId;
    
     /**
    * @var integer
    *
    * @ORM\Column(name="event_id", type="integer")
    */
     private $eventId;
     
       /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    
     /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=255, nullable=true)
     */
    private $description;
    
      /**
     * @var string
     *
     * @ORM\Column(name="star_desc", type="string", length=255, nullable=true)
     */
    private $starDesc;
    
      /**
     * @var string
     *
     * @ORM\Column(name="category_desc", type="string", length=255, nullable=true)
     */
    private $categoryDesc;
  

    /**
     * Get gtsId
     *
     * @return integer 
     */
    public function getGtsId()
    {
        return $this->gtsId;
    }

    /**
     * Set starDesc
     *
     * @param string $starDesc
     * @return GTSconfig
     */
    public function setStarDesc($starDesc)
    {
        $this->starDesc = $starDesc;

        return $this;
    }

    /**
     * Get starDesc
     *
     * @return string 
     */
    public function getStarDesc()
    {
        return $this->starDesc;
    }

    /**
     * Set categoryDesc
     *
     * @param string $categoryDesc
     * @return GTSconfig
     */
    public function setCategoryDesc($categoryDesc)
    {
        $this->categoryDesc = $categoryDesc;

        return $this;
    }

    /**
     * Get categoryDesc
     *
     * @return string 
     */
    public function getCategoryDesc()
    {
        return $this->categoryDesc;
    }

    /**
     * Set event
     *
     * @param \Entertainment\Bundle\RedCarpetBundle\Entity\Event $event
     * @return GTSconfig
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

    /**
     * Set eventId
     *
     * @param integer $eventId
     * @return GTSconfig
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
     * Set title
     *
     * @param string $title
     * @return GTSconfig
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return GTSconfig
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
