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
        public function getUser(string $email) : User{
            return new User(1,'test','testp','testowy opis','test.jpg');
        }
        public function getUserByUid(int $uid) : User{
            //kwerenda do bazy 
            return new User(1,'test','testp','testowy opis','test.jpg');
        }
    }