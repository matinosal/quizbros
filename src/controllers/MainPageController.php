<?php

    namespace Classes\Controllers;

    use Classes\Controllers\Controller;
    use Classes\Models\User;
    use Classes\Repositories\UserRepository;

class MainPageController extends Controller{
        
        private $userRepository;

        public function index() : void{
            $this->userRepository = new UserRepository();
            $logged = $this->session->isLogged();
            $user = $logged ? $this->getLoggedUser() : null;
            
            $this->render('main-page',[
                'title'         => 'QuizBros - Strona główna',
                'scripts'       => $this->loadScripts(),
                'styles'        => $this->loadStyles(['style']),
                'user_logged'   => $logged,
                'user'          => $user
            ]);
        }
        public function logout() : void{
            $this->session->clear();
            $this->cookie->clear();
            header("Location: http://".$_SERVER['HTTP_HOST']."/");
            die();  
        }
        private function getLoggedUser() : User{
            $uid = $this->session->getLoggedUid();
            $user = $this->userRepository->getUserByUid($uid);
            return $user;
        }
    }