<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GTSvideo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GTSvideo
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
     * @ORM\Column(name="video_embed", type="text", nullable=true)
     */
    private $videoEmbed;

    /**
     * @var string
     *
     * @ORM\Column(name="video_id", type="string", length=255, nullable=true)
     */
    private $videoId;

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
     * Set videoEmbed
     *
     * @param string $videoEmbed
     * @return GTSvideo
     */
    public function setVideoEmbed($videoEmbed)
    {
        $this->videoEmbed = $videoEmbed;

        return $this;
    }

    /**
     * Get videoEmbed
     *
     * @return string 
     */
    public function getVideoEmbed()
    {
        return $this->videoEmbed;
    }

    /**
     * Set videoId
     *
     * @param string $videoId
     * @return GTSvideo
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;

        return $this;
    }

    /**
     * Get videoId
     *
     * @return string 
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * Set twitterText
     *
     * @param string $twitterText
     * @return GTSvideo
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
     * @return GTSvideo
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
     * Set assetId
     *
     * @param string $assetId
     * @return GTSvideo
     */
    public function setAssetId($assetId)
    {
        $this->assetId = $assetId;

        return $this;
    }

    /**
     * Get assetId
     *
     * @return string 
     */
    public function getAssetId()
    {
        return $this->assetId;
    }

    /**
     * Set star
     *
     * @param \Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTSstar $star
     * @return GTSvideo
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
     * @return GTSvideo
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
     * @return GTSvideo
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
     * @return GTSvideo
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
