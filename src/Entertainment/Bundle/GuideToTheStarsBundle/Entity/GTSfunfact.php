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
     * @ORM\Column(name="fun_fact", type="string", length=255, nullable=true)
     */
    private $funFact;

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
     * Set twitterText
     *
     * @param string $twitterText
     * @return GTSfunfact
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
     * @return GTSfunfact
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
     * @return GTSfunfact
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
     * @return GTSfunfact
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
}
