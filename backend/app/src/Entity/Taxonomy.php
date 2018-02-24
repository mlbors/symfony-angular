<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Doctrine\Common\Collections\Collection as Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaxonomyRepository")
 */
class Taxonomy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\Column(type="string", name="title", length=100)
    * @Assert\NotBlank()
    */
    private $title;

    /**
     * One Taxonomy has Many terms.
     * @ORM\OneToMany(targetEntity="Term", mappedBy="taxonomy")
     */
    private $terms;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->terms = new ArrayCollection();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

   /**
    * Get the value of title
    */ 
   public function getTitle()
   {
      return $this->title;
   }

   /**
    * Set the value of title
    *
    * @return  self
    */ 
   public function setTitle($title)
   {
      $this->title = $title;

      return $this;
   }

    /**
     * Get one Taxonomy has Many terms.
     */ 
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set one Taxonomy has Many terms.
     *
     * @return  self
     */ 
    public function setTerms($terms)
    {
        $this->terms = $terms;

        return $this;
    }
}
