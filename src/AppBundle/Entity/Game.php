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
   * @var Outing The outing of this game
   *
   * @ORM\ManyToOne(targetEntity="Outing", inversedBy="games")
   * @Assert\NotNull
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

  public function setOutings(Outing $ountings)
  {
    $this->outings = $outings;
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
