<?php
    namespace Classes\Repositories;
    use Classes\Repositories\Repository;
    use Classes\Handlers\DBHandler;
    use Classes\Models\User;

    class UserRepository extends Repository{
        public function getUser(string $email) : ?User{
            $query = $this->dbref->connect()->prepare(
                "SELECT * FROM public.users where email=:email"
            );
            $query->bindParam(":email",$email,\PDO::PARAM_STR);
            $query->execute();

            $result = $query->fetch();
            if(!$result)
                return null;
            return new User(
                $result['id'],
                $result['username'],
                $result['password'],
                $result['email'],
                $result['description']);
        }
        public function getUserByUid(int $uid) : User{
            //kwerenda do bazy 
            return new User(1,'test','testp','testowy opis','test.jpg');
        }
        public function addNewUser(string $login,string $passw,string $email){
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