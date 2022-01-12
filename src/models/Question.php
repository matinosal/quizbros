<?php

namespace Classes\Models;

class Question
{
    private int $id;
    private int $quizId;
    private string $content;
    private array $answers = [];

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

    public function getQuizId(): int
    {
        return $this->quizId;
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

    public function setQuizId(int $id): void
    {
        $this->quizId = $id;
    }

    public function addAnswer(Answer $answer): void
    {
        $this->answers[] = $answer;
    }
    public function getWrongAnswers(): array
    {
        return array_filter($this->answers, fn ($answer) => !$answer->isTrue());
    }
    public function getCorrectAnswer(): array
    {
        return array_filter($this->answers, fn ($answer) => $answer->isTrue());
    }
}
