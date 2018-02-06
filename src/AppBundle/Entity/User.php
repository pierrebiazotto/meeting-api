<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * A User.
 * @ApiResource
 * @ORM\Entity
 */
class User
{
  /**
   * @var int The id of this User.
   *
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @var string The $nickname of this User.
   *
   * @ORM\Column(type="string")
   */
  private $nickname;

  /**
   * @var \DateTimeInterface The $birthdate of the user.
   *
   * @ORM\Column(type="datetime")
   */
  private $birthdate;

  /**
   * @var string The gender of this User.
   *
   * @ORM\Column(type="string")
   */
  private $gender;

  /**
   * @var string The password of this User.
   *
   * @ORM\Column(type="varchar")
   */
  private $password;

  /**
   * @var boolean Organizer or not.
   *
   * @ORM\Column(type="boolean")
   */
  private $isOrganizer;

  /**
   * @ORM\OneToMany(targetEntity="Comment", mappedBy="users")
   */
  private $comments;
  /**
   * @ORM\OneToMany(targetEntity="Rating", mappedBy="users")
   */
  private $ratings;

  public function __construct()
  {
      $this->comments = new ArrayCollection();
      $this->ratings = new ArrayCollection();
  }

  /**
   * @return Collection|Comment[]
   */
  public function getComments()
  {
    return $this->comments;
  }

  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  /**
   * @return Collection|Rating[]
   */
  public function getRatings()
  {
    return $this->ratings;
  }

  public function setRatings($ratings)
  {
    $this->ratings = $ratings;
  }

  public function getId()
  {
      return $this->id;
  }

  public function getNickname() : string
  {
      return $this->nickname;
  }

  public function setNickname(string $nickname)
  {
      $this->nickname = $nickname;
  }
  public function getBirthDate() : date
  {
      return $this->birthdate;
  }

  public function setBirthDate(Date $birthdate)
  {
      $this->birthdate = $birthdate;
  }

  public function getGender() : string
  {
      return $this->gender;
  }

  public function setGender(string $gender)
  {
      $this->gender = $gender;
  }

  public function getPassword() : string
  {
      return $this->password;
  }

  public function setPassword(string $password)
  {
      $this->password = $password;
  }

  public function getIsOrganizer() : boolean
  {
      return $this->isOrganizer;
  }

  public function setIsOrganizer(boolean $isOrganizer)
  {
      $this->isOrganizer = $isOrganizer;
  }
}
