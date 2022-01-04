<?php 

    namespace Classes\Controllers;

    use Classes\Helpers\UserRedirect;
    use Classes\Repositories\UserRepository;
    use Classes\Repositories\QuizRepository;

class QuizController extends Controller{

    public function quiz(){
        global $path;
        $userRepository = new UserRepository();
        $quizRepository = new QuizRepository();

        $pathSeparated = explode('/',$path);
        $quid = array_pop($pathSeparated);
        if(!is_numeric($quid))
            UserRedirect::redirectToMainPage();

        $logged_user = $this->session->isLogged();
        if($logged_user)
            $user = $userRepository->getUserByUid($this->session->getLoggedUid());
        
        
        $quiz = $quizRepository->getQuizByid(intval($quid));

        $this->render('quiz',[
            'title'         => 'Quiz - '.$quiz->getName(),
            'scripts'       => $this->loadScripts(),
            'styles'        => $this->loadStyles(['style']),
            'user_logged'   => $logged_user,
            'user'          => $user ?? null,
            'quiz'          => $quiz
        ]);
    }
}