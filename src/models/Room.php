<?php

namespace Classes\Models;

class Room
{
    private int $roomId;
    private int $userId;
    private string $name;
    private string $roomCode;

    public function __construct(int $roomId, int $userId, string $name, string $roomCode)
    {
        $this->userId = $userId;
        $this->roomId = $roomId;
        $this->name = $name;
    }
    public function getRoomId(): int
    {
        return $this->roomId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getRoomCode(): string
    {
        return $this->roomCode;
    }
}
