<?php
    namespace Classes\Repositories;

    use Classes\Repositories\Repository;
    use Classes\Repositories\AnswerRepository;
    use Classes\Handlers\DBHandler;
    use Classes\Models\Question;

    class QuestionRepository extends Repository{

        private AnswerRepository $answerRepository;

        public function __construct()
        {
            parent::__construct();
            $this->answerRepository = new AnswerRepository();
        }

        public function getFirstQuestion(int $id): Question{
            return $this->getQuestion($id);
        }

        public function getQuestionByOrder(int $id, int $order) : Question{
            return $this->getQuestion($id,$order);
        }

        private function getQuestion(int $id, int $order = 0) : Question{
            $query = $this->dbref->connect()->prepare(
                "SELECT id_question,content FROM public.questions where id_quiz=:id ORDER BY quiz_order LIMIT 1 OFFSET :offset "
            );
            $query->bindParam(":id",$id,\PDO::PARAM_INT);
            $query->bindParam(":offset",$order,\PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch();
            if(!$result)
                die("DB connection err. Please try again :(");
            $question = new Question(
                $result['id_question'],
                $result['content']
            );

            $question->setAnswers(
                $this->answerRepository->getAnswers($question->getId())
            );

            return $question;
        }
    }