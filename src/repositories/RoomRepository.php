<?php

namespace Classes\Repositories;

use Classes\Models\Room;
use Classes\Repositories\Repository;

class RoomRepository extends Repository
{
    public function makeNewRoom(int $userId, int $quizId, string $name, string $code): ?int
    {
        $query = $this->dbref->connect()->prepare(
            "INSERT INTO public.rooms(id_user,id_quiz,room_name,room_code) VALUES (:userId,:quizId,:roomName,:roomcode) RETURNING id_room"
        );
        $query->bindParam(":userId", $userId, \PDO::PARAM_INT);
        $query->bindParam(":quizId", $quizId, \PDO::PARAM_INT);
        $query->bindParam(":roomName", $name, \PDO::PARAM_STR);
        $query->bindParam(":roomcode", $code, \PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetch(\PDO::FETCH_ASSOC);
        return $result['id_room'] ?: 0;
    }

    public function getRoomInfo(int $roomId): Room
    {
        $query = $this->dbref->connect()->prepare(
            "SELECT id_user,room_name,room_code FROM public.rooms where id_room = :idRoom"
        );
        $query->bindParam(":idRoom", $roomId, \PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch(\PDO::FETCH_ASSOC);

        if (!$result)
            die("DB ERR :/");

        return new Room($roomId, $result['id_user'], $result['room_name'], $result['room_code']);
    }
}
