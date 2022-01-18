<?php

namespace Classes\Controllers;

use Classes\Helpers\UserRedirect;
use Classes\Repositories\RoomRepository;
use Classes\Repositories\UserRepository;

class GameController extends Controller
{

    public function makeroom(): void
    {
        UserRedirect::redirectIfNotLogged($this->session);
        $userRepository = new UserRepository();
        $user = $userRepository->getUserByUid($this->session->getLoggedUid());
        if ($this->isPost()) {
            $roomId = $this->createRoom($user->getUid(), $_POST['quiz_id'], $_POST['room_name']);
            if (!$roomId)
                die("Try again :(");
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/room/$roomId");
            die();
        }

        $this->render('make-room', [
            'title'         => 'QuizBros - Kreator gry',
            'scripts'       => $this->loadScripts(['makeroom', 'header']),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => true,
            'user'          => $user,
        ]);
    }
    public function game(): void
    {
        if (!$this->isPost() || !isset($_POST['code'])) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/");
            die();
        }

        $roomRepository = new RoomRepository();
        $room =  $roomRepository->getRoomByCode($_POST['code']);
        $this->render('game', [
            'title'         => 'QuizBros - Gra' . $room->getName(),
            'scripts'       => $this->loadScripts([]),
            'styles'        => $this->loadStyles(['style']),
            'room'          => $room,
        ]);
    }
    public function room(): void
    {
        global $path;
        $roomRepository = new RoomRepository();
        $pathSeparated = explode('/', $path);
        $roomId = (int)array_pop($pathSeparated);

        $room = $roomRepository->getRoomInfo($roomId);

        $this->render('room', [
            'title'         => 'QuizBros - Gra' . $room->getName(),
            'scripts'       => $this->loadScripts(['header']),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => true,
            'room'          => $room,
        ]);
    }

    private function createRoom(int $userId, string $quizId, string $room_name): ?int
    {
        //sprawdzic czy taki quiz istnieje
        $quizId = intval($quizId);
        $roomRepository = new RoomRepository();
        $code = random_int(100000, 999999);
        $roomId = $roomRepository->makeNewRoom($userId, $quizId, $room_name, '' . $code);
        return $roomId;
    }
}
