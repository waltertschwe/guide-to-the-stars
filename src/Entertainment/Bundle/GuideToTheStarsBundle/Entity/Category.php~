<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Category
{
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
     * @ORM\Column(name="category_name", type="string", length=255)
     */
    private $categoryName;

    /**
     * @var string
     *
     * @ORM\Column(name="category_short_name", type="string", length=255)
     */
    private $categoryShortName;


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
     * Set categoryName
     *
     * @param string $categoryName
     * @return Category
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
     * Set categoryShortName
     *
     * @param string $categoryShortName
     * @return Category
     */
    public function setCategoryShortName($categoryShortName)
    {
        $this->categoryShortName = $categoryShortName;

        return $this;
    }

    /**
     * Get categoryShortName
     *
     * @return string 
     */
    public function getCategoryShortName()
    {
        return $this->categoryShortName;
    }
}
