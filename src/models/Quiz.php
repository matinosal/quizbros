<?php
    namespace Classes\Models;

    class Quiz{
        private int $quid;
        private string $name;
        private array $questions;
        private string $description;
        private string $category;

        public function __construct(int $quid,string $name, string $description, string $category){
            $this->quid = $quid;
            $this->name = $name;
            $this->description = $description;
            $this->category = $category;
        }

        public function getQuid(){
            return $this->quid;
        }

        public function getName(){
            return $this->name;
        }

        public function getQuestions(){
            return $this->questions;
        }

        public function getDescription(){
            return $this->description;
        }

        public function getCategory(){
            return $this->category;
        }
        
    }