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
                die("DB connection err. Please try again :(");
            return new User(
                $result['id'],
                $result['username'],
                $result['password'],
                $result['description'],
                $result['image_src']);
        }

        public function getUserByUid(int $uid) : ?User{
            $query = $this->dbref->connect()->prepare(
                "SELECT * FROM public.users WHERE id=:uid"
            );
            $query->bindParam(":uid",$uid,\PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(\PDO::FETCH_ASSOC);
            if(!$result)
                die("DB connection err. Please try again :(");

            return new User(
                $result['id'],
                $result['username'],
                $result['password'],
                $result['description'],
                $result['image_src']);
        }

        public function addNewUser(string $login,string $passw,string $email) : int{
            $query = $this->dbref->connect()->prepare(
                "INSERT INTO public.users(username,password,email,description) values(:login,:passw,:email,'') RETURNING id"
            );
            $query->bindParam(":login",$login,\PDO::PARAM_STR);
            $query->bindParam(":passw",$passw,\PDO::PARAM_STR);
            $query->bindParam(":email",$email,\PDO::PARAM_STR);
            $query->execute();

            $result = $query->fetch(\PDO::FETCH_ASSOC);
            return $result['id'] ?: 0;
        }

        public function setNewDescription(int $uid, $userDescription) : void{
            $query = $this->dbref->connect()->prepare(
                "UPDATE public.users set description=:description where id=:uid"
            );
            $query->bindParam(":description",$userDescription,\PDO::PARAM_STR);
            $query->bindParam(":uid",$uid,\PDO::PARAM_INT);
            $query->execute();
            die();
        }
    }