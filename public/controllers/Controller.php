<?php

namespace Classes\Controllers;

use Classes\Handlers\CookieHandler;
use Classes\Handlers\SessionHandler;
use Classes\Handlers\ErrorHandler;

class Controller{
        private $method;
        protected ErrorHandler $err;
        protected CookieHandler $cookie;

        public function __construct() {
            $this->method = $_SERVER['REQUEST_METHOD'];
            $this->err = new ErrorHandler();
            $this->session = new SessionHandler();
        }

        protected function isPost() : bool{
            return $this->method == 'POST';
        }

        protected function isGet() : bool{
            return $this->method == 'GET';
        } 

        protected function loadScripts(array $files = []) : string{
            return $this->loadFiles($files,'js');
        }

        protected function loadStyles(array $files = [])  : string{
            return $this->loadFiles($files,'css');
        }

        private function loadFiles(array $files,string $type) : string{
            if($type == "css")
                $token = "<link rel='stylesheet' href='public/assets/css/x.css' />";
            
            elseif($type == "js")
                $token = "<script src='public/assets/js/x.js'></script>";

            else
                return '';

            $html = '';
            foreach($files as $filename){
                $html .= preg_replace('/x/',$filename,$token);
            }
            return $html;
        }
        protected function render(string $template = null, array $data = []) : void {
            $templatePath = 'public/views/'.$template.'.php';
            $output = 'File not found.';
            if(file_exists($templatePath)){
                extract($data);
                ob_start();
                include $templatePath;
                $output = ob_get_clean();
            }

            print $output;
        }
    }