<?php 

    namespace Classes\Controllers;

use Classes\Helpers\UserRedirect;
use Classes\Models\UserRepository;

class UserController extends Controller{

    private $userRepository;

    public function profile(){
        UserRedirect::redirectIfNotLogged($this->session);
        $userRepository = new UserRepository();
        $user = $userRepository->getUserByUid($this->session->getLoggedUid());
        $this->render('profile',[
            'title'         => 'QuizBros - title',
            'scripts'       => $this->loadScripts(),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => true,
            'user'          => $user
        ]);

    }

    public function quizes(){
        UserRedirect::redirectIfNotLogged($this->session);
        $userRepository = new UserRepository();
        $user = $userRepository->getUserByUid($this->session->getLoggedUid());
        $this->render('quizes',[
            'title'         => 'QuizBros - title',
            'scripts'       => $this->loadScripts(),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => true,
            'user'          => $user
        ]);
    }
}