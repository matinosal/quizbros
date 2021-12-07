<?php

    namespace Classes\Controllers;

    use Classes\Controllers\Controller;
    use Classes\Handlers\ErrorHandler;
    use Classes\Models\UserRepository;
    use Classes\Models\User;

class SecurityController extends Controller{

        public function __construct()
        {
            $this->err = new ErrorHandler();
            $this->userRepository = new UserRepository();
            parent::__construct();
        }
        //pobranie z bazy usera o takim mailu
        //stworzenie obiektu user jesli istnieje w bazie
        //sprawdzenie hasla
        //jesli sa bledy to zbieranie info o nich
        //wyswietlenie strony login z bledem
        //przekierowanie na strone glowna (zrobienie ciasteczka o poprawnym loginie)
        public function login() : void{
            if($this->isPost() && !$this->checkLogin()){
                $user = $this->userRepository->getUser($_POST['email']);

                if($user == null || $user?->getPassword() != $_POST['password'])
                    $this->err->raise("Błędny email lub hasło");
                else{
                    header("Location: http://".$_SERVER['HTTP_HOST']."/");          
                }
                
            }

            $this->render('login',[
                'title'             => 'QuizBros - login',
                'scripts'           => $this->loadScripts(['auth.js']),
                'styles'            => $this->loadStyles(['style']),
                'errorMessages'     => $this->err->getErrors()
            ]);
        }

        private function checkLogin() : bool { // '' string len 0
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