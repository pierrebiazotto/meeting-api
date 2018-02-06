<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Category.
 * @ApiResource
 * @ORM\Entity
 */
class Category
{
  /**
   * @var int The id of this category.
   *
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @var string The title of this category.
   *
   * @ORM\Column
   */
  private $name;

  /**
   * @ORM\OneToMany(targetEntity="Outing", mappedBy="category")
   */
  private $outings;

  public function __construct()
  {
      $this->outings = new ArrayCollection();
  }

  /**
   * @return Collection|Outing[]
   */
  public function getOutings()
  {
    return $this->outings;
  }

  public function setOutings(Outing $outings)
  {
    $this->outings = $outings;
  }

  public function addOuting(Outing $outing): void
  {
      $outing->category = $this;
      $this->$outings->add($outing);
  }

  public function removeOuting(Outing $outing): void
  {
      $outing->category = null;
      $this->outings->removeElement($outing);
  }

  public function getId()
  {
      return $this->id;
  }

  public function getName() : string
  {
      return $this->name;
  }

  public function setName(string $name)
  {
      $this->name = $name;
  }
}
