<?php

    namespace Classes\Repositories;

    use Classes\Repositories\Repository;
    use Classes\Models\Answer;

    class AnswerRepository extends Repository{

        public function getAnswers(int $questionId) : array{
            $query = $this->dbref->connect()->prepare(
                "SELECT id_answer,content,is_true FROM public.question_answers where id_question=:id"
            );
            $query->bindParam(":id",$questionId,\PDO::PARAM_INT);
            $query->execute();

            if(!$query->rowCount()){
                die("DB error");
            }

            $answers = [];

            while( ($result = $query->fetch()) ){
                $answers[] = new Answer(
                    $result['id_answer'],
                    $result['content'],
                    $result['is_true'],
                );
            }

            return $answers;
        }
    }