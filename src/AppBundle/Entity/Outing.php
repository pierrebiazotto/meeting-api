<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * An Outing.
 * @ApiResource
 * @ORM\Entity
 */
class Outing
{
  /**
   * @var int The id of this 0uting.
   *
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @var string The title of this 0uting.
   *
   * @ORM\Column
   */
  private $title;

  /**
   * @var string The description of this 0uting.
   *
   * @ORM\Column(type="text")
   */
  private $description;

  /**
   * @var \DateTimeInterface The publication date of this 0uting.
   *
   * @ORM\Column(type="datetime")
   */
  private $publicationDate;

  /**
   * @var int The min_age allowed in this outing
   *
   * @ORM\Column(type="integer")
   */
  private $min_age;

  /**
   * @var int The max_age allowed in this outing
   *
   * @ORM\Column(type="integer")
   */
  private $max_age;

  /**
   * @var Comment[] Available comments for this outing.
   *
   * @ORM\OneToMany(targetEntity="Comment", mappedBy="outing")
   */
  private $comments;

  /**
   * @ORM\ManyToOne(targetEntity="Category", inversedBy="outing")
   * @ORM\JoinColumn(nullable=true)
   */
  private $category;

  /**
   * @ORM\OneToMany(targetEntity="Rating", mappedBy="outing")
   */
  private $ratings;

  /**
   * @ORM\OneToMany(targetEntity="Game", mappedBy="outing")
   */
  private $games;

  public function __construct()
  {
      $this->ratings = new ArrayCollection();
      $this->games = new ArrayCollection();
  }
  /**
   * @return Collection|Rating[]
   */
  public function getRatings()
  {
    return $this->ratings;
  }

  /**
   * @return Collection|Game[]
   */
  public function getGames()
  {
    return $this->games;
  }

  public function getCategory(): Category
  {
      return $this->category;
  }

  public function setCategory(Category $category)
  {
      $this->category = $category;
  }

  public function getId()
  {
      return $this->id;
  }

  public function getTitle() : string
  {
      return $this->title;
  }

  public function setTitle(string $title)
  {
      $this->title = $title;
  }
  public function getDescription() : string
  {
      return $this->description;
  }

  public function setDescription(string $description)
  {
      $this->description = $description;
  }
  public function getPublicationDate() : date
  {
      return $this->publicationDate;
  }

  public function setPublicationDate(Date $publicationDate)
  {
      $this->publicationDate = $publicationDate;
  }

  public function getMinAge() : int
  {
      return $this->min_age;
  }

  public function setMinAge(int $min_age)
  {
      $this->min_age = $min_age;
  }

  public function getMaxAge() : int
  {
      return $this->max_age;
  }

  public function setMaxAge(int $max_age)
  {
      $this->max_age = $max_age;
  }

  public function getComments() : Comment
  {
    return $this->comments;
  }

  public function setComments(Comment $comments)
  {
    $this->comments = $comments;
  }

}
