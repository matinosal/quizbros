<?php

namespace Classes\Models;

class Question
{
    private int $id;
    private string $content;
    private array $answers;


    public function __construct(int $id, string $content)
    {
        $this->id = $id;
        $this->content = $content;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function getAnswerValues(): array
    {
        return array_map(function ($obj) {
            return $obj->getContent();
        }, $this->answers);
    }

    public function setAnswers($answers): void
    {
        $this->answers = $answers;
    }
}
