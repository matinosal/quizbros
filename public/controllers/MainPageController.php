<?php

    namespace Classes\Controllers;

    use Classes\Controllers\Controller;

    class MainPageController extends Controller{
        
        protected function getData() : array{
            return [];
        }

        public function index() : void{
            $this->render('main-page',[
                'title'     => 'QuizBros - Strona główna',
                'scripts'   => $this->loadScripts(),
                'styles'    => $this->loadStyles(['style']),
            ]);
        }
    }