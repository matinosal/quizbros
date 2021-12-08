<?php
    namespace Classes\Models;

    class User{
        private int $uid;
        private string $login;
        private string $password;
        private string $desc;
        private string $image;

        public function __construct($uid,$login,$password,$desc,$image)
        {
            $this->uid = $uid;
            $this->login = $login;
            $this->password = $password;
            $this->desc = $desc;
            $this->image = $image;
        }

        public function getUid() : int {
            return $this->uid;
        }
        public function getLogin() : string{
            return $this->login;
        }

        public function getPassword() : string{
            return $this->password;
        }

        public function getDesc() : string{
            return $this->desc;
        }

        public function getImage() : string{
            return $this->image;
        }
    }