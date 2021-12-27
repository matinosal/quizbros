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

        private function getLoggedUser() : User{
            $uid = $this->session->getLoggedUid();
            $user = $this->userRepository->getUserByUid($uid);
            return $user;
        }
    }