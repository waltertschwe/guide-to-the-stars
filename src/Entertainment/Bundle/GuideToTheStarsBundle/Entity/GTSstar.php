<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    
    
     /**
    * @ORM\ManyToMany(targetEntity="Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTScategory")
    * @ORM\JoinTable(name="GTSstarcatrel",
    *      joinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")},
    *      inverseJoinColumns={@ORM\JoinColumn(name="star_id", referencedColumnName="id", onDelete="CASCADE")})
    */
   
    protected $category;
       
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
     * Set categoryId
     *
     * @param integer $categoryId
     * @return GTSstar
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

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
}
