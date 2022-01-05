<?php

    namespace Classes\Models;

    class Answer{
        private int $id;
        private string $content;
        private bool $isTrue;

        public function __construct(int $id, string $content, bool $isTrue)
        {
            $this->id = $id;
            $this->content = $content;
            $this->isTrue = $isTrue;
        }

        public function getId() : int {
            return $this->id;
        }

        public function getContent() : string {
            return $this->content;
        }

        public function isTrue() : bool {
            return $this->isTrue;
        }

        public function __toString(){
            return $this->content;
        }
    }