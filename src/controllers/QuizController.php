<?php

namespace Classes\Controllers;

use Classes\Controllers\Controller;
use Classes\Helpers\Enums\QuizEnum;
use Classes\Helpers\UserRedirect;
use Classes\Models\Question;
use Classes\Repositories\QuestionRepository;
use Classes\Repositories\UserRepository;
use Classes\Repositories\QuizRepository;

class QuizController extends Controller
{

    public function quiz(): void
    {
        global $path;

        $pathSeparated = explode('/', $path);
        $quizID = array_pop($pathSeparated);
        if (!is_numeric($quizID))
            UserRedirect::redirectToMainPage();

        $userRepository = new UserRepository();
        $quizRepository = new QuizRepository();
        $questionRepository = new QuestionRepository();

        $logged_user = $this->session->isLogged();
        if ($logged_user)
            $user = $userRepository->getUserByUid($this->session->getLoggedUid());

        $quizID = intval($quizID);
        $quiz = $quizRepository->getQuizByid($quizID);
        $firstQuestion = $questionRepository->getFirstQuestion($quizID);

        $this->render('quiz', [
            'title'         => 'Quiz - ' . $quiz->getName(),
            'scripts'       => $this->loadScripts(['main-quiz', 'header']),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => $logged_user,
            'user'          => $user ?? null,
            'quiz'          => $quiz,
            'question'      => $firstQuestion
        ]);
    }

    public function quizes()
    {
        UserRedirect::redirectIfNotLogged($this->session);
        $userRepository = new UserRepository();
        $quizRepository = new QuizRepository();
        $questionRepository = new QuestionRepository();
        $user = $userRepository->getUserByUid($this->session->getLoggedUid());

        $quizes =  $quizRepository->getUserQuizes($user->getUid());

        if (empty($quizes))
            $message[] = QuizEnum::NoQuizes;

        else {
            $quizesIds = array_map(fn ($obj) => $obj->getID(), $quizes);

            foreach ($questionRepository->getQuizesFirstQuestion($quizesIds) as $question) {
                $index = array_search($question->getQuizId(), $quizesIds);
                $quizes[$index]->addQuestion($question);
            }
        }

        $this->render('quizes', [
            'title'         => 'Quiz - Twoje Quizy',
            'scripts'       => $this->loadScripts(['quiz-edit', 'header']),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => true,
            'user'          => $user ?? null,
            'quizes'        => $quizes,
            'message'       => $message ?? [],
        ]);
    }
    public function newquiz(): void
    {
        UserRedirect::redirectIfNotLogged($this->session);
        $userRepository = new UserRepository();
        $user = $userRepository->getUserByUid($this->session->getLoggedUid());
        $this->render('new-quiz', [
            'title'         => 'Quiz - Nowy Quiz',
            'scripts'       => $this->loadScripts(['quiz-creator', 'header']),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => true,
            'user'          => $user ?? null,
            'message'       => $message ?? [],
        ]);
    }

    public function addQuiz(): void
    {
        $obj = json_decode(file_get_contents('php://input'));
        $uid = $this->session->getLoggedUid();

        if (!isset($obj->objects) || !isset($obj->quizname) || $uid == null)
            echo json_encode(['success' => false]);

        $quizRepository = new QuizRepository();
        $questionRepository = new QuestionRepository();
        $newQuizID = $quizRepository->addQuiz($uid, $obj->quizname);
        $questionRepository->addQuestions($newQuizID, $obj);

        echo json_encode(['success' => true]); // zmienic na true
    }
    public function getQuestions(): void
    {
        $obj = json_decode(file_get_contents('php://input'));
        if (!isset($obj->id))
            die();

        $questionRepository = new QuestionRepository();
        $quizRepository = new QuizRepository();

        $quizId = $obj->id;
        $questions = $questionRepository->getAllQuestions($quizId);

        $answers = array_map(function ($obj) {
            return array(
                'question' => $obj->getContent(),
                'answers'  => $obj->getAnswerValues()
            );
        }, $questions);

        if (($uid = $this->session->getLoggedUid()) && $quizRepository->isUserQuiz($uid, $quizId)) {
            foreach ($questions as $key => $question) {
                $correctAnswers = $question->getCorrectAnswer();
                $answer = array_pop($correctAnswers);
                $answers[$key]['correct'] = $answer->getContent();
            }
        }
        echo json_encode($answers);
    }

    public function getQuizes()
    {
        $obj = json_decode(file_get_contents('php://input'));
        $name = $obj->name;
        if ($name == null)
            echo json_encode(['error' => true]);

        $quizRepository = new QuizRepository();
        $quizes = $quizRepository->searchQuizes($name);
        $filteredQuizes = array_map(function ($obj) {
            return array(
                'id'    => $obj->getId(),
                'name'  => $obj->getName()
            );
        }, $quizes);
        echo json_encode($filteredQuizes);
    }
}
