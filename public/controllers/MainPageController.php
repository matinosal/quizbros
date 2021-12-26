<?php

    namespace Classes\Controllers;

    use Classes\Controllers\Controller;
    use Classes\Models\User;
    use Classes\Models\UserRepository;

class MainPageController extends Controller{
        
        private $userRepository;

        public function index() : void{
            $this->userRepository = new UserRepository();
            $logged = $this->session->isLogged();
            $this->user = $logged ? $this->getLoggedUser() : null;
            

            
            $this->render('main-page',[
                'title'         => 'QuizBros - Strona główna',
                'scripts'       => $this->loadScripts(),
                'styles'        => $this->loadStyles(['style']),
                'user_logged'   => $logged,
                'user'          => $this->user
            ]);
        }

        private function getLoggedUser() : User{
            $uid = $this->session->getLoggedUid();
            $user = $this->userRepository->getUserByUid($uid);
            return $user;
        }
    }