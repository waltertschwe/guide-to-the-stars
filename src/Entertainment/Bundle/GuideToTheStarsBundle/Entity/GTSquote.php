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
}
