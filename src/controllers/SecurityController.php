<?php

    namespace Classes\Controllers;

    use Classes\Controllers\Controller;
    use Classes\Handlers\ErrorHandler;
    use Classes\Handlers\CookieHandler;
    use Classes\Handlers\SessionHandler;
    use Classes\Helpers\StringMethods;
    use Classes\Helpers\Enums\DBErrorEnum;
    use Classes\Repositories\UserRepository;
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
            if($this->isPost())
                $this->addNewUser($_POST);
                
            $this->render('register',[
                'title'         => 'QuizBros - register',
                'scripts'       => $this->loadScripts(['auth']),
                'styles'        => $this->loadStyles(['style']),
                'errorMessages' => $this->err->getErrors(),
                'user_logged'   => false,
            ]);
        }

        private function addNewUser($data) : void{

            if(count($data) < 4){
                $this->err->raise("Nie wypełniono poprawnie wszystkich pól");
                return;
            }

            $login = $data['login'] ?? "";
            $passw = $data['password'] ?? "";
            $email = $data['email'] ?? "";
            $consent = $data['consent'] ?? true;
            if(!$this->checkRegisterFields($login,$passw,$email,$consent))
                return;

            $uid = $this->userRepository->addNewUser($login,$passw,$email);
            if($uid == DBErrorEnum::FailedToAddUser){
                $this->err->raise("Błąd przy dodawaniu użytkownika, proszę spróbować ponownie");
                return;
            }

            $this->session->setLoggedUser($uid);
            header("Location: http://".$_SERVER['HTTP_HOST']."/");
            die();      
        }
        private function checkRegisterFields($login,$passw,$email,$consent){
            if(strlen($login) < 5 ||
             StringMethods::checkForSpecialChars($login) ||
             StringMethods::checkForPolishChars($login)
             )
                $this->err->raise("Login nie powinien zawierać znaków specjalnych, polskich liter.Musi mieć więcej niż 5 znaków");
            
            if(strlen($passw)<7 || strlen($passw) > 100 ){
                $this->err->raise("Hasło musi mieć co najmniej 6 znaków");
                #nwm sprawdzić  czy takie hasło jest juz w bazie
            }

            if(!StringMethods::isEmailPattern($email))
                $this->err->raise("Niepoprawny format pola email");
            
            if($consent == "")
                $this->err->raise("Proszę wyrazić zgodę na przetwarzanie danych osobowych");
            
            return !$this->err->isError();
        }
    }