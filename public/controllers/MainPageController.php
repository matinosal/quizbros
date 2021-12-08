<?php

    namespace Classes\Controllers;

    use Classes\Controllers\Controller;
    use Classes\Models\User;
    use Classes\Models\UserRepository;

class MainPageController extends Controller{
        
        private $userRepository;

        public function index() : void{
            $logged = $this->cookie->isLogged();

            $this->userRepository = new UserRepository();

            if($logged){
                $this->user = $this->getLoggedUser();
            }
            $this->render('main-page',[
                'title'         => 'QuizBros - Strona główna',
                'scripts'       => $this->loadScripts(),
                'styles'        => $this->loadStyles(['style']),
                'user_logged'   => $logged,
                'user'          => $this->user
            ]);
        }

        private function getLoggedUser() : User{
            $uid = $this->cookie->getLoggedUid();
            $user = $this->userRepository->getUserByUid($uid);
            return $user;
        }
    }