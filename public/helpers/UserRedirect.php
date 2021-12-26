<?php
    namespace Classes\Helpers;

    use Classes\Handlers\SessionHandler;

    class UserRedirect{
        static public function redirectIfNotLogged(SessionHandler $session) : int{
            header("Location: http://".$_SERVER['HTTP_HOST']."/");
            die();  
        }
    }