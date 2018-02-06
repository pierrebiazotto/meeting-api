<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A Comment.
 * @ApiResource
 * @ORM\Entity
 */
class Comment
{
  /**
   * @var int The id of this comment.
   *
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @var \DateTimeInterface The publication date of this comment.
   *
   * @ORM\Column(type="datetime")
   */
  private $publicationDate;

  /**
   * @var string The comment
   *
   * @ORM\Column(type="text")
   */
  private $comment;

  /**
   * @var Outing The outing of this comment
   *
   * @ORM\ManyToOne(targetEntity="Outing", inversedBy="comments")
   * @Assert\NotNull
   */
  private $outing;

  /**
   * @var User The owner of this comment
   *
   * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
   * @ORM\JoinColumn(nullable=true)
   */
  private $user;

  public function getUser(): User
  {
      return $this->user;
  }

  public function setUser(User $user)
  {
      $this->user = $user;
  }

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

  public function getId()
  {
      return $this->id;
  }

  public function getComment() : string
  {
      return $this->comment;
  }

  public function setComment(string $comment)
  {
      $this->comment = $comment;
  }

  public function getPublicationDate() : date
  {
      return $this->publicationDate;
  }

  public function setPublicationDate(Date $publicationDate)
  {
      $this->publicationDate = $publicationDate;
  }
}
