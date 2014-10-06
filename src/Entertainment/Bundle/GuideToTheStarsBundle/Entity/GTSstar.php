<?php

namespace Entertainment\Bundle\GuideToTheStarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GTSstar
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GTSstar
{
    
    public function __construct()
    {
        $this->category = new ArrayCollection();
    }
    
    // INFO ON ONE-TO-MANY
    //A unidirectional one-to-many association can be mapped through a join table. 
    //From Doctrine’s point of view, it is simply mapped as a unidirectional many-to-many whereby a unique constraint on one of the join columns enforces the one-to-many cardinality.
    //
    
    /**
    * @ORM\ManyToMany(targetEntity="Entertainment\Bundle\GuideToTheStarsBundle\Entity\GTScategory")
    * @ORM\JoinTable(name="star_category",
    *      joinColumns={@ORM\JoinColumn(name="star_id", referencedColumnName="id")},
    *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id", unique=true)})
    */
   
    private $category;
       
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


  
}
