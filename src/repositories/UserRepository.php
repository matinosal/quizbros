<?php
    namespace Classes\Repositories;
    use Classes\Repositories\Repository;
    use Classes\Handlers\DBHandler;
    use Classes\Models\User;

    class UserRepository extends Repository{
        public function getUser(string $email) : User{
            return new User(1,'test','testp','testowy opis','test.jpg');
        }
        public function getUserByUid(int $uid) : User{
            //kwerenda do bazy 
            return new User(1,'test','testp','testowy opis','test.jpg');
        }
        public function addNewUser($login,$passw,$email){
            $query = $this->dbref->connect()->prepare(
                "INSERT INTO public.users(username,password,email,description) values(:login,:passw,:email,'') RETURNING id"
            );
            $query->bindParam(":login",$login,\PDO::PARAM_STR);
            $query->bindParam(":passw",$passw,\PDO::PARAM_STR);
            $query->bindParam(":email",$email,\PDO::PARAM_STR);
            $query->execute();

            $result = $query->fetch();
            return $result['id'] ?: 0;
        }
    }