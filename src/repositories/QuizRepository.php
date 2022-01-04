<?php
    namespace Classes\Repositories;
    use Classes\Repositories\Repository;
    use Classes\Handlers\DBHandler;
    use Classes\Models\Quiz;

    class QuizRepository extends Repository{
    
        public function getQuizes(int $limit) : array{
            $query = $this->dbref->connect()->prepare(
                "SELECT * FROM public.quizes as q inner join public.categories as c on q.category_id = c.id_category LIMIT :limit"
            );
            $query->bindParam(":limit",$limit,\PDO::PARAM_INT);
            $query->execute();
            if(!$query->rowCount())
                die("DB connection err. Please try again :(");

            $quizes = [];
            while( ($result = $query->fetch()) ){
                $quizes[] = new Quiz(
                    $result['id_quiz'],
                    $result['name'],
                    $result['quiz_description'],
                    $result['category_name']
                );
            }

            return $quizes;
        }
    
    }
