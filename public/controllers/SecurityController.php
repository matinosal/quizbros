<?php

    namespace Classes\Controllers;
    use Classes\Controllers\Controller;

    class SecurityController extends Controller{

        protected function getData() : array{
            return [];
        }

        public function login() : void{
            $this->render('login',[
                'title'     => 'QuizBros - login',
                'scripts'   => $this->loadScripts(),
                'styles'    => $this->loadStyles(['style']),
            ]);
        }
    }