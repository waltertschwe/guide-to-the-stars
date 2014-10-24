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
     * @ORM\ManyToOne(targetEntity="Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSstar")
     * @ORM\JoinColumn(name="star_id", referencedColumnName="id")
     **/
    private $star;
    
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    
      /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;
    

    /**
     * @var string
     *
     * @ORM\Column(name="image_title", type="string", length=255, nullable=true)
     */
    private $imageTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255, nullable=true)
     */
    private $imageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * @var string
     *
     * @ORM\Column(name="image_caption", type="string", length=255, nullable=true)
     */
    private $imageCaption;

    /**
     * @var string
     *
     * @ORM\Column(name="image_credit", type="string", length=255, nullable=true)
     */
    private $imageCredit;
    
    /**
     * @var string
     *
     * @ORM\Column(name="twitter_text", type="string", length=140, nullable=true)
     */
    private $twitterText;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_text", type="string", length=255, nullable=true)
     */
    private $facebookText;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     *
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

    /**
     * Set twitterText
     *
     * @param string $twitterText
     * @return GTSimage
     */
    public function setTwitterText($twitterText)
    {
        $this->twitterText = $twitterText;

        return $this;
    }

    /**
     * Get twitterText
     *
     * @return string 
     */
    public function getTwitterText()
    {
        return $this->twitterText;
    }

    /**
     * Set facebookText
     *
     * @param string $facebookText
     * @return GTSimage
     */
    public function setFacebookText($facebookText)
    {
        $this->facebookText = $facebookText;

        return $this;
    }

    /**
     * Get facebookText
     *
     * @return string 
     */
    public function getFacebookText()
    {
        return $this->facebookText;
    }

    /**
     * Set star
     *
     * @param \Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSstar $star
     * @return GTSimage
     */
    public function setStar(\Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSstar $star = null)
    {
        $this->star = $star;

        return $this;
    }

    /**
     * Get star
     *
     * @return \Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSstar 
     */
    public function getStar()
    {
        return $this->star;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return GTSimage
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return GTSimage
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
     * Set type
     *
     * @param string $type
     * @return GTSimage
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
