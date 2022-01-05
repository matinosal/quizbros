<?php 

    namespace Classes\Controllers;
    
    use Classes\Controllers\Controller;
    use Classes\Helpers\UserRedirect;
    use Classes\Repositories\UserRepository;

class UserController extends Controller{

    private $userRepository;

    public function profile(){
        UserRedirect::redirectIfNotLogged($this->session);
        $userRepository = new UserRepository();
        $user = $userRepository->getUserByUid($this->session->getLoggedUid());
        $this->render('profile',[
            'title'         => 'QuizBros - Twój profil ',
            'scripts'       => $this->loadScripts(['profile']),
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