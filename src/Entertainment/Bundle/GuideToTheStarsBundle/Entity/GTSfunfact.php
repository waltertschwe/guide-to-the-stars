<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GTSfunfact
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GTSfunfact
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
     * @ORM\Column(name="fun_fact", type="string", length=255, nullable=true)
     */
    private $funFact;

    /**
     * @var string
     *
     * @ORM\Column(name="fun_twitter", type="string", length=140, nullable=true)
     */
    private $funTwitter;

    /**
     * @var string
     *
     * @ORM\Column(name="fun_facebook", type="string", length=255, nullable=true)
     */
    private $funFacebook;
    
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
     * Set funFact
     *
     * @param string $funFact
     * @return GTSfunfact
     */
    public function setFunFact($funFact)
    {
        $this->funFact = $funFact;

        return $this;
    }

    /**
     * Get funFact
     *
     * @return string 
     */
    public function getFunFact()
    {
        return $this->funFact;
    }

    /**
     * Set funTwitter
     *
     * @param string $funTwitter
     * @return GTSfunfact
     */
    public function setFunTwitter($funTwitter)
    {
        $this->funTwitter = $funTwitter;

        return $this;
    }

    /**
     * Get funTwitter
     *
     * @return string 
     */
    public function getFunTwitter()
    {
        return $this->funTwitter;
    }

    /**
     * Set funFacebook
     *
     * @param string $funFacebook
     * @return GTSfunfact
     */
    public function setFunFacebook($funFacebook)
    {
        $this->funFacebook = $funFacebook;

        return $this;
    }

    /**
     * Get funFacebook
     *
     * @return string 
     */
    public function getFunFacebook()
    {
        return $this->funFacebook;
    }
}
