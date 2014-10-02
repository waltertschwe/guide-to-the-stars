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
}
