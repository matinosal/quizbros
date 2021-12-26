<?php

    namespace Classes\Controllers;

    use Classes\Controllers\Controller;
    use Classes\Handlers\ErrorHandler;
    use Classes\Handlers\CookieHandler;
    use Classes\Handlers\SessionHandler;
    use Classes\Models\UserRepository;
    use Classes\Models\User;

class SecurityController extends Controller{

        public function __construct()
        {
            parent::__construct();
            $this->userRepository = new UserRepository();
        }
       
        public function login() : void{
            if($this->isPost() && !$this->checkLogin()){
                $user = $this->userRepository->getUser($_POST['email']);

                if($user == null || $user?->getPassword() != $_POST['password'])
                    $this->err->raise("Błędny email lub hasło");
                else{
                    $this->session->setLoggedUser($user->getUid());
                    header("Location: http://".$_SERVER['HTTP_HOST']."/");
                    die();          
                }
                
            }

            $this->render('login',[
                'title'             => 'QuizBros - login',
                'scripts'           => $this->loadScripts(['auth.js']),
                'styles'            => $this->loadStyles(['style']),
                'user_logged'       => false,
                'errorMessages'     => $this->err->getErrors()
            ]);
        }

        private function checkLogin() : bool {
            $email = $_POST['email'] ?? "";
            $password = $_POST['password'] ?? ""; 
            if($email ==  "")
                $this->err->raise("Nie podano adresu e-mail");

            if($password == '')
                $this->err->raise("Nie podano hasła");
            return $this->err->isError();
        }

        //sprawdzenie czy w bazie znajduje sie juz taki email
        //jesli nie to wysylam nowego usera do bazy
        //przekierowanie na strone glowna z ciasteczkiem 
        //jesli cos jest jednak nie tak to pokazywanie bledow na stronie
        public function register() : void{
            $this->render('register',[
                'title'     => 'QuizBros - register',
                'scripts'   => $this->loadScripts(['auth']),
                'styles'    => $this->loadStyles(['style']),
            ]);
        }
    }