<?php
    namespace Classes\Models;

    use Classes\Handlers\DBHandler;
    use Classes\Models\User;

    class UserRepository{
        private DBHandler $dbref;
        public function __construct()
        {
            $this->dbref = new DBHandler();
        }
        public function getUser($email) : User{
            return new User('test','testp','testowy opis','test.jpg');
        }
    }