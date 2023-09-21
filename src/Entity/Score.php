<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ScoreRepository::class)
 */
class Score
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"score:read", "user:read", "quiz:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"score:read", "user:read", "quiz:read", "category:read"})
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="scores")
     * @Groups({"score:read", "category:read"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Quiz::class, inversedBy="scores")
     * @Groups({"score:read", "user:read"})
     */
    private $quiz;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getQuiz(): ?Quiz
    {
        return $this->quiz;
    }

    public function setQuiz(?Quiz $quiz): self
    {
        $this->quiz = $quiz;

        return $this;
    }
}