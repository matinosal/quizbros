<?php

namespace Classes\Controllers;

    abstract class Controller{

        abstract public function getData() : array;
        public function loadScripts(array $files = []) : string{
            $html =  '';
            foreach($files as $name)
                $html .= "<link rel='stylesheet' href='public/assets/js/$name.js'>";
            return $html;
        }
        protected function loadStyles(array $files = [])  : string{
            $html =  '';
            foreach($files as $name)
                $html .= "<link rel='stylesheet' href='public/assets/css/$name.css'>";
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