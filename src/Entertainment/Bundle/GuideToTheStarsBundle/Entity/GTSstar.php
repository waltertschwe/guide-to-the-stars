<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GTSstar
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GTSstar
{
    
    public function __construct()
    {
        $this->category = new ArrayCollection();
    }
    
    // INFO ON ONE-TO-MANY
    //A unidirectional one-to-many association can be mapped through a join table. 
    //From Doctrine’s point of view, it is simply mapped as a unidirectional many-to-many whereby a unique constraint on one of the join columns enforces the one-to-many cardinality.
    //
    
    /**
    * @ORM\ManyToMany(targetEntity="Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTScategory")
    * @ORM\JoinTable(name="star_category",
    *      joinColumns={@ORM\JoinColumn(name="star_id", referencedColumnName="id")},
    *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")})
    */
   
    private $category;
       
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="star_name", type="string", length=255)
     */
    private $starName;

    /**
     * @var string
     *
     * @ORM\Column(name="star_description", type="text")
     */
    private $starDescription;

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
     * Set starName
     *
     * @param string $starName
     * @return GTSstar
     */
    public function setStarName($starName)
    {
        $this->starName = $starName;

        return $this;
    }

    /**
     * Get starName
     *
     * @return string 
     */
    public function getStarName()
    {
        return $this->starName;
    }

    /**
     * Set starDescription
     *
     * @param string $starDescription
     * @return GTSstar
     */
    public function setStarDescription($starDescription)
    {
        $this->starDescription = $starDescription;

        return $this;
    }

    /**
     * Get starDescription
     *
     * @return string 
     */
    public function getStarDescription()
    {
        return $this->starDescription;
    }
    
     /**
     * @var string
     *
     * @ORM\Column(name="imageBubbleName", type="string", length=255)
     */
    private $imageBubbleName;
    
     /**
     * @var string
     *
     * @ORM\Column(name="imageLargeName", type="string", length=255)
     */
    private $imageLargeName;

    /**
     * Add category
     *
     * @param \Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTScategory $category
     * @return GTSstar
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

    /**
     * Set imageBubbleName
     *
     * @param string $imageBubbleName
     * @return GTSstar
     */
    public function setImageBubbleName($imageBubbleName)
    {
        $this->imageBubbleName = $imageBubbleName;

        return $this;
    }

    /**
     * Get imageBubbleName
     *
     * @return string 
     */
    public function getImageBubbleName()
    {
        return $this->imageBubbleName;
    }

    /**
     * Set imageLargeName
     *
     * @param string $imageLargeName
     * @return GTSstar
     */
    public function setImageLargeName($imageLargeName)
    {
        $this->imageLargeName = $imageLargeName;

        return $this;
    }

    /**
     * Get imageLargeName
     *
     * @return string 
     */
    public function getImageLargeName()
    {
        return $this->imageLargeName;
    }
}
