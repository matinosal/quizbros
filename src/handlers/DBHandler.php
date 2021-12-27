<?php
    namespace Classes\Handlers;
    class DBHandler{
        private \PDO $conn;
        private string $host;
        private int $port;
        private string $dbname;
        private string $user;
        private string $passwd;

        //host=sheep port=5432 dbname=test user=lamb password=bar
        public function __construct()
        {
            $this->host = HOST;
            $this->port = PORT;
            $this->dbname = DBNAME;
            $this->user = USER;
            $this->passwd = PASSW;
        }
        public function connect(){
            $conn_config = "pgsql:host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->passwd";
            $this->conn = new \PDO($conn_config);
        }
    }
