<?php
    namespace Classes\Handlers;

    class SessionHandler{
        private array $data;

        public function __construct(){
            session_start();
            $this->data = $_SESSION;
        }

        public function isLogged() : bool {
            return isset($this->data['uid']);
        }

        public function setLoggedUser(int $uid) : void{
            $_SESSION['uid'] = $uid;
        }

        public function getLoggedUid() : int {
            return intval($this->data['uid']);
        }
    }