<?php

namespace Classes\Controllers;

use Classes\Helpers\UserRedirect;
use Classes\Repositories\QuizRepository;
use Classes\Repositories\UserRepository;

class UserController extends Controller
{

    private $userRepository;

    public function profile()
    {
        UserRedirect::redirectIfNotLogged($this->session);
        $userRepository = new UserRepository();
        $quizRepository = new QuizRepository();

        $userId = $this->session->getLoggedUid();
        $user = $userRepository->getUserByUid($userId);
        $quizes = $quizRepository->getUserQuizes($userId, 1);

        $this->render('profile', [
            'title'         => 'QuizBros - Twój profil ',
            'scripts'       => $this->loadScripts(['profile']),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => true,
            'user'          => $user,
            'quizes'        => $quizes
        ]);
    }

    public function profileEdit()
    {
        $userRepository = new UserRepository();
        $obj = json_decode(file_get_contents('php://input'));
        if (isset($obj->description)) {
            $description = $obj->description;
            $userID = $this->session->getLoggedUid();
            $userRepository->setNewDescription($userID, $description);
        }
        die();
    }
}
