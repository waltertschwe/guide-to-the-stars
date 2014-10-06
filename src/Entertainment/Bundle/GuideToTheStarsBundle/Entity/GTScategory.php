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

   
}
