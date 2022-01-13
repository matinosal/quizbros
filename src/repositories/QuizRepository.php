<?php

namespace Classes\Repositories;

use Classes\Repositories\Repository;
use Classes\Handlers\DBHandler;
use Classes\Models\Quiz;
use Classes\Helpers\Enums\QuizEnum;

class QuizRepository extends Repository
{

    public function getQuizes(int $limit): array
    {
        $query = $this->dbref->connect()->prepare(
            "SELECT * FROM public.quizes as q inner join public.categories as c on q.category_id = c.id_category LIMIT :limit"
        );
        $query->bindParam(":limit", $limit, \PDO::PARAM_INT);
        $query->execute();
        if (!$query->rowCount())
            die("DB connection err. Please try again :(");

        return $this->createQuizObjects($query);
    }

    public function getUserQuizes(int $id, $limit = QuizEnum::NoLimit)
    {
        $limitQuery = "";
        if ($limit != QuizEnum::NoLimit)
            $limitQuery = "LIMIT $limit";

        $query = $this->dbref->connect()->prepare(
            "SELECT * FROM public.quizes as q inner join public.categories as c on q.category_id = c.id_category where q.id_user=:id $limitQuery"
        );
        $query->bindParam(":id", $id, \PDO::PARAM_INT);
        $query->execute();

        if (!$query->rowCount())
            return [];

        return $this->createQuizObjects($query);
    }

    public function getQuizByid(int $id): Quiz
    {
        $query = $this->dbref->connect()->prepare(
            "SELECT * FROM public.quizes AS q INNER JOIN public.categories AS c ON q.category_id = c.id_category WHERE id_quiz=:id"
        );
        $query->bindParam(":id", $id, \PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch(\PDO::FETCH_ASSOC);
        if (!$result)
            die("DB connection err. Please try again :(");

        return new Quiz(
            $result['id_quiz'],
            $result['name'],
            $result['quiz_description'],
            $result['category_name']
        );
    }

    public function getQuestionsNumber(int $id): int
    {
        $query = $this->dbref->connect()->prepare(
            "SELECT count(*) FROM public.quizes AS q INNER JOIN public.questions AS qq ON q.id_quiz = qq.id_quiz WHERE q.id_quiz=:id"
        );
        $query->bindParam(":id", $id, \PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch(\PDO::FETCH_ASSOC);
        if (!$result)
            die("DB connection err. Please try again :(");

        return $result['count'];
    }

    public function addQuiz(int $id, string $title): int
    {
        $query = $this->dbref->connect()->prepare(
            "INSERT INTO public.quizes(name,id_user,quiz_description,category_id) VALUES (:title,:id,'opis musi byc',1) RETURNING id_quiz"
        );
        $query->bindParam(":id", $id, \PDO::PARAM_INT);
        $query->bindParam(":title", $title, \PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetch(\PDO::FETCH_ASSOC);
        return $result['id_quiz'] ?: 0;
    }
    private function createQuizObjects($query)
    {
        $quizes = [];
        while (($result = $query->fetch())) {
            $quizes[] = new Quiz(
                $result['id_quiz'],
                $result['name'],
                $result['quiz_description'],
                $result['category_name']
            );
        }

        return $quizes;
    }

    public function isUserQuiz(int $user, int $quiz): bool
    {
        $query = $this->dbref->connect()->prepare(
            "SELECT * FROM public.quizes AS q  WHERE q.id_quiz=:id and q.id_user=:uid"
        );
        $query->bindParam(":id", $quiz, \PDO::PARAM_INT);
        $query->bindParam(":uid", $user, \PDO::PARAM_INT);
        $query->execute();

        if (!$query->fetch(\PDO::FETCH_ASSOC))
            return false;

        return true;
    }

    public function searchQuizes(string $searchText)
    {
        $query = $this->dbref->connect()->prepare(
            "SELECT * FROM public.quizes as q inner join public.categories as c on q.category_id = c.id_category where q.name LIKE '%$searchText%'"
        );
        $query->execute();
        if (!$query->rowCount())
            die("DB connection err. Please try again :(");
        return $this->createQuizObjects($query);
    }
}
