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
}
