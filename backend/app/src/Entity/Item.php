<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Doctrine\Common\Collections\Collection as Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItemRepository")
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="id")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="title", length=100)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="text", name="content")
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     * @Assert\NotBlank()
     */
    private $createdAt;

    /**
     * Many Items have Many Taxonomies.
     * @ORM\ManyToMany(targetEntity="Taxonomy", inversedBy="items")
     * @ORM\JoinTable(name="items_taxonomies",
     *      joinColumns={@ORM\JoinColumn(name="item_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="taxonomy_id", referencedColumnName="id")})
     */
    private $taxonomies;

    /**
     * Many Items have Many Attributes.
     * @ORM\ManyToMany(targetEntity="Attribute", inversedBy="items")
     * @ORM\JoinTable(name="items_attributes",
     *      joinColumns={@ORM\JoinColumn(name="item_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="attribute_id", referencedColumnName="id")})
     */
    private $attributes;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->taxonomies = new ArrayCollection();
        $this->attributes = new ArrayCollection();
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
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get the value of Taxonomies.
     */ 
    public function getTaxonomies()
    {
        return $this->taxonomies;
    }

    /**
     * Set set the value Taxonomies.
     *
     * @return  self
     */ 
    public function setTaxonomies($taxonomies)
    {
        $this->taxonomies = $taxonomies;
        return $this;
    }

    /**
     * Get the value of Attributes.
     */ 
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set set the value Attributes.
     *
     * @return  self
     */ 
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }
}
