<?php 

    namespace Classes\Controllers;

use Classes\Helpers\UserRedirect;
use Classes\Repositories\QuizRepository;
use Classes\Repositories\UserRepository;

class UserController extends Controller{

    private $userRepository;

    public function profile(){
        UserRedirect::redirectIfNotLogged($this->session);
        $userRepository = new UserRepository();
        $quizRepository = new QuizRepository();

        $userId = $this->session->getLoggedUid();
        $user = $userRepository->getUserByUid($userId);
        $quizes = $quizRepository->getUserQuizes($userId,1);

        $this->render('profile',[
            'title'         => 'QuizBros - Twój profil ',
            'scripts'       => $this->loadScripts(['profile']),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => true,
            'user'          => $user,
            'quizes'        => $quizes
        ]);

    }

    public function profileEdit(){
        $userRepository = new UserRepository();

        if(isset($_POST['description'])){
            $description = $_POST['description'];
            $userID = $this->session->getLoggedUid();
            $userRepository->setNewDescription($userID,$description);
        }
        $user = $userRepository->getUserByUid($this->session->getLoggedUid());
        var_dump($user);
        die();
    }
}