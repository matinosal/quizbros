<?php

namespace Classes\Controllers;

    abstract class Controller{

        abstract protected function getData() : array;
        
        protected function loadScripts(array $files = []) : string{
            return $this->loadFiles($files,'js');
        }
        protected function loadStyles(array $files = [])  : string{
            return $this->loadFiles($files,'css');
        }
        private function loadFiles(array $files,string $type){
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
        protected function render(string $template = null, array $data = []){
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