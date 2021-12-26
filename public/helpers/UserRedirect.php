<?php
    namespace Classes\Helpers;

    use Classes\Handlers\SessionHandler;

    class UserRedirect{
        static public function redirectIfNotLogged(SessionHandler $session) : void{
            if(!$session->isLogged()){
                header("Location: http://".$_SERVER['HTTP_HOST']."/");
                die();  
            }
        }
    }