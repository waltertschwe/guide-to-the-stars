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
}
