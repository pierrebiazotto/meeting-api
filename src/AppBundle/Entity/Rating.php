<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Rating.
 * @ApiResource
 * @ORM\Entity
 */
class Rating
{
  /**
   * @var int The id of this rating.
   *
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @var int The rating
   *
   * @ORM\Column(type="smallint")
   */
  private $rating;

  /**
   * @ORM\ManyToOne(targetEntity="Users", inversedBy="ratings")
   * @ORM\JoinColumn(nullable=true)
   */
  private $user;

  /**
   * @ORM\ManyToOne(targetEntity="Outing", inversedBy="ratings")
   * @ORM\JoinColumn(nullable=true)
   */
  private $outing;

  public function getOuting(): Outing
  {
      return $this->outing;
  }

  public function setOuting(Outing $outing)
  {
      $this->outing = $outing;
  }

  public function getId()
  {
      return $this->id;
  }

  public function getRating() : string
  {
      return $this->rating;
  }

  public function setRating(string $rating)
  {
      $this->rating = $rating;
  }


  public function getUser(): User
  {
      return $this->user;
  }

  public function setUser(User $user)
    {
        $this->user = $user;
    }
}
