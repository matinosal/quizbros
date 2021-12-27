<?php
    namespace Classes\Handlers;

    class CookieHandler{

        private array $cookies;

        public function __construct()
        {
            $this->cookies = $_COOKIE;
        }

        public function setLoggedUser(int $uid) : void{
            setcookie("user_logged",$uid,time()+3600);
        }

        public function isLogged() : bool {
            return isset($this->cookies['user_logged']);
        }

        public function getLoggedUid() : int {
            return intval($this->cookies['user_logged']);
        }
        public function clear() : void{
            /*TODO 
                jak będę używać jakiś cookies to można wtedy je usunąć tutaj w tej funkcji
            */
            return;
        }
    }