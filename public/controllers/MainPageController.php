<?php

    namespace Classes\Controllers;

    use Classes\Controllers\Controller;

    class MainPageController extends Controller{
        
        public function getData() : array{
            return [];
        }

        public function index() : void{
            $this->render('main-page',[
                'scripts'   => $this->loadScripts(),
                'styles'    => $this->loadStyles(['style']),
            ]);
        }
    }