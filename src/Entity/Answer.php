<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $description;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isRight = false;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: Question::class)]
    private Question $question;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isRight(): bool
    {
        return $this->isRight;
    }

    public function setIsRight(bool $isRight): static
    {
        $this->isRight = $isRight;

        return $this;
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    public function setQuestion(Question $question): static
    {
        $this->question = $question;

        return $this;
    }
}
