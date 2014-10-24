<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GTSquote
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GTSquote
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
     * @ORM\Column(name="quote_credit", type="string", length=255, nullable=true)
     */
    private $quoteCredit;

    /**
     * @var string
     *
     * @ORM\Column(name="quote_text", type="text", nullable=true)
     */
    private $quoteText;

    /**
     * @var string
     *
     * @ORM\Column(name="quote_image", type="string", length=255, nullable=true)
     */
    private $quoteImage;
    
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
     * @ORM\Column(name="position", type="integer", nullable = true)
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
     * Set quoteCredit
     *
     * @param string $quoteCredit
     * @return GTSquote
     */
    public function setQuoteCredit($quoteCredit)
    {
        $this->quoteCredit = $quoteCredit;

        return $this;
    }

    /**
     * Get quoteCredit
     *
     * @return string 
     */
    public function getQuoteCredit()
    {
        return $this->quoteCredit;
    }

    /**
     * Set quoteText
     *
     * @param string $quoteText
     * @return GTSquote
     */
    public function setQuoteText($quoteText)
    {
        $this->quoteText = $quoteText;

        return $this;
    }

    /**
     * Get quoteText
     *
     * @return string 
     */
    public function getQuoteText()
    {
        return $this->quoteText;
    }

    /**
     * Set quoteImage
     *
     * @param string $quoteImage
     * @return GTSquote
     */
    public function setQuoteImage($quoteImage)
    {
        $this->quoteImage = $quoteImage;

        return $this;
    }

    /**
     * Get quoteImage
     *
     * @return string 
     */
    public function getQuoteImage()
    {
        return $this->quoteImage;
    }

    /**
     * Set twitterText
     *
     * @param string $twitterText
     * @return GTSquote
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
     * @return GTSquote
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
     * @return GTSquote
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
     * @return GTSquote
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
     * @return GTSquote
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
     * @return GTSquote
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
