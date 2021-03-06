<?php

namespace Entertainment\Bundle\ArrivalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Gallery
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Gallery
{
    
    /**
     * @ORM\ManyToOne(targetEntity="Entertainment\Bundle\RedCarpetBundle\Entity\Event")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="event_id")
     */
     
    private $event;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="gallery_id", type="integer")
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="credit", type="string", length=255, nullable=true)
     */
    private $credit;

    /**
     * @var string
     *
     * @ORM\Column(name="imageName", type="string", length=255)
     */
    private $imageName;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255)
     */
    private $position;


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
     * Set title
     *
     * @param string $title
     * @return Gallery
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
     * Set credit
     *
     * @param string $credit
     * @return Gallery
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return string 
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return Gallery
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string 
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Gallery
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }
    
    ## This counts the current number of images in a gallery 
    ## based off eventId
    public function galleryCounter($eventId)
    {   
        $sql = " 
            select NUM, count(1) as count 
            from Event 
            where num = " . $eventId . "
            group by NUM
        ";
        
        $em = $this->getDoctrine()->getManager();
        $result = $em->getConnection()->exec( $sql );
        return $result;
        
    }   

    /**
     * Set eventId
     *
     * @param integer $eventId
     * @return Gallery
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
     * Set event
     *
     * @param \Entertainment\Bundle\RedCarpetBundle\Entity\Event $event
     * @return Gallery
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
