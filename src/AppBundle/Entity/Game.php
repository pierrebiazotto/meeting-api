<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A Game.
 * @ApiResource
 * @ORM\Entity
 */
class Game
{
  /**
   * @var int The id of this game.
   *
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @var string The title of this game.
   *
   * @ORM\Column
   */
  private $name;

  /**
   * @var Outing The outing of this comment
   *
   * @ORM\ManyToOne(targetEntity="Outing", inversedBy="comment")
   * @Assert\NotNull
   */
  private $outing;

  public function __construct()
  {
      $this->outings = new ArrayCollection();
  }
  /**
   * @return Collection|Outing[]
   */
  public function getOuting()
  {
    return $this->outings;
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
