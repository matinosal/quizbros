<?php
    namespace Classes\Models;

    class User{
        private int $uid;
        private string $login;
        private string $password;
        private string $description;
        private ?string $imageSrc;

        public function __construct($uid,$login,$password,$description,$imageSrc)
        {
            $this->uid = $uid;
            $this->login = $login;
            $this->password = $password;
            $this->description = $description;
            $this->imageSrc = $imageSrc;
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

        public function getDescription() : string{
            return $this->description;
        }

        public function getImage() : ?string{
            return $this->imageSrc;
        }
    }