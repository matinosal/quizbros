<?php 

    namespace Classes\Controllers;

    use Classes\Controllers\Controller;
use Classes\Helpers\Enums\QuizEnum;
use Classes\Helpers\UserRedirect;
    use Classes\Models\Question;
    use Classes\Repositories\QuestionRepository;
    use Classes\Repositories\UserRepository;
    use Classes\Repositories\QuizRepository;

class QuizController extends Controller{

    public function quiz() : void{
        global $path;

        $pathSeparated = explode('/',$path);
        $quizID = array_pop($pathSeparated);
        if(!is_numeric($quizID))
            UserRedirect::redirectToMainPage();

        $userRepository = new UserRepository();
        $quizRepository = new QuizRepository();
        $questionRepository = new QuestionRepository();

        $logged_user = $this->session->isLogged();
        if($logged_user)
            $user = $userRepository->getUserByUid($this->session->getLoggedUid());
        
        $quizID = intval($quizID);
        $quiz = $quizRepository->getQuizByid($quizID);
        $firstQuestion = $questionRepository->getFirstQuestion($quizID);

        $this->render('quiz',[
            'title'         => 'Quiz - '.$quiz->getName(),
            'scripts'       => $this->loadScripts(['main-quiz']),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => $logged_user,
            'user'          => $user ?? null,
            'quiz'          => $quiz,
            'question'      => $firstQuestion
        ]);
    }

    public function quizes(){
        UserRedirect::redirectIfNotLogged($this->session);
        $userRepository = new UserRepository();
        $quizRepository = new QuizRepository();
        $user = $userRepository->getUserByUid($this->session->getLoggedUid());

        $quizes =  $quizRepository->getUserQuizes($user->getUid());
        if(empty($quizes))
            $message[] = QuizEnum::NoQuizes;

        $this->render('quizes',[
            'title'         => 'Quiz - Twoje Quizy',
            'scripts'       => $this->loadScripts(),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => true,
            'user'          => $user ?? null,
            'quizes'        => $quizes,
            'message'       => $message ?? [],
        ]);
    }

    public function getQuestion() : void {
        if(!isset($_POST['id'])|| !isset($_POST['order']))
            die();
        
        $questionRepository = new QuestionRepository();
        $quizRepository = new QuizRepository();
        $quizId = $_POST['id'];
        $questionNumber = $_POST['order'];

        $question = $questionRepository->getQuestionByOrder($quizId,$questionNumber);
        $questionQuantity = $quizRepository->getQuestionsNumber($quizId);
        if($questionNumber <= $questionQuantity || $questionNumber <= 0)
            $buttonLock = true;
        else
            $buttonLock = false;

        $answers = array_map(function($obj){
            return $obj->getContent();
        },$question->getAnswers());

        echo json_encode([
            'question'      => $question->getContent(),
            'answers'       => $answers,
            'buttonLock'    => $buttonLock,
        ]);
    }
}