<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GTSimage
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GTSimage
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
     * @ORM\Column(name="image_title", type="string", length=255)
     */
    private $imageTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255)
     */
    private $imageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", length=255)
     */
    private $imageName;

    /**
     * @var string
     *
     * @ORM\Column(name="image_caption", type="string", length=255)
     */
    private $imageCaption;

    /**
     * @var string
     *
     * @ORM\Column(name="image_credit", type="string", length=255)
     */
    private $imageCredit;


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
     * Set imageTitle
     *
     * @param string $imageTitle
     * @return GTSimage
     */
    public function setImageTitle($imageTitle)
    {
        $this->imageTitle = $imageTitle;

        return $this;
    }

    /**
     * Get imageTitle
     *
     * @return string 
     */
    public function getImageTitle()
    {
        return $this->imageTitle;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     * @return GTSimage
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string 
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return GTSimage
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
     * Set imageCaption
     *
     * @param string $imageCaption
     * @return GTSimage
     */
    public function setImageCaption($imageCaption)
    {
        $this->imageCaption = $imageCaption;

        return $this;
    }

    /**
     * Get imageCaption
     *
     * @return string 
     */
    public function getImageCaption()
    {
        return $this->imageCaption;
    }

    /**
     * Set imageCredit
     *
     * @param string $imageCredit
     * @return GTSimage
     */
    public function setImageCredit($imageCredit)
    {
        $this->imageCredit = $imageCredit;

        return $this;
    }

    /**
     * Get imageCredit
     *
     * @return string 
     */
    public function getImageCredit()
    {
        return $this->imageCredit;
    }
}
