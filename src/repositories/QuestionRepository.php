<?php

namespace Classes\Repositories;

use Classes\Repositories\Repository;
use Classes\Repositories\AnswerRepository;
use Classes\Handlers\DBHandler;
use Classes\Helpers\StringMethods;
use Classes\Models\Question;

class QuestionRepository extends Repository
{

    private AnswerRepository $answerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->answerRepository = new AnswerRepository();
    }

    public function getFirstQuestion(int $id): Question
    {
        return $this->getQuestion($id);
    }

    public function getQuestionByOrder(int $id, int $order): Question
    {
        return $this->getQuestion($id, $order);
    }

    private function getQuestion(int $id, int $order = 0): Question
    {
        $query = $this->dbref->connect()->prepare(
            "SELECT id_question,content FROM public.questions where id_quiz=:id ORDER BY quiz_order LIMIT 1 OFFSET :offset "
        );
        $query->bindParam(":id", $id, \PDO::PARAM_INT);
        $query->bindParam(":offset", $order, \PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch();
        if (!$result)
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

    public function getAllQuestions(int $id)
    {
        $query = $this->dbref->connect()->prepare(
            "SELECT id_question,content FROM public.questions where id_quiz=:id ORDER BY quiz_order"
        );
        $query->bindParam(":id", $id, \PDO::PARAM_INT);
        $query->execute();

        if (!$query->rowCount())
            die('DB err');

        $questions = [];
        while (($result = $query->fetch())) {
            $question = new Question(
                $result['id_question'],
                $result['content']
            );
            $question->setAnswers(
                $this->answerRepository->getAnswers($question->getId())
            );
            $questions[] = $question;
        }
        return $questions;
    }

    public function addQuestions(int $id, object $reqObj)
    {
        foreach ($reqObj->objects as $order => $question) {
            $query = $this->dbref->connect()->prepare(
                "INSERT INTO public.questions(content,id_quiz,quiz_order) values(:content,:id,:order) RETURNING id_question"
            );
            $query->bindParam(":content", $question->text, \PDO::PARAM_STR);
            $query->bindParam(":id", $id, \PDO::PARAM_INT);
            $query->bindParam(":order", $order, \PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(\PDO::FETCH_ASSOC);
            if (!$result)
                die("DB connection err. Please try again :(");

            $questionID = $result['id_question'];
            $queryValues = '';
            foreach ($question->answers as $i => $answer) {
                $queryValues .= "('$answer',$questionID," . (($i == $question->checked) ? "true" : "false") . "),";
            }
            $queryValues = StringMethods::removeLastCharacter($queryValues);

            $query = $this->dbref->connect()->prepare(
                "INSERT INTO public.question_answers(content,id_question,is_true) VALUES $queryValues RETURNING id_answer"
            );
            $query->execute();
            $result = $query->fetch(\PDO::FETCH_ASSOC);

            if (!$result)
                die("DB connection err. Please try again :(");
        }
    }
}
