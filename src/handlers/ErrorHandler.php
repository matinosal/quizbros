<?php
    namespace Classes\Handlers;

    class ErrorHandler{
        private bool $isError ;
        private array $errorMessages;
        public function __construct()
        {
            $this->isError = false;
            $this->errorMessages = [];
        }
        public function raise($message) : void{
            $this->isError = true;
            $this->errorMessages[] = $message;
        }
        public function isError() : bool{
            return $this->isError;
        }
        public function getErrors() : array{
            return $this->errorMessages;
        }
    }