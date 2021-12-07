<?php
    namespace Classes\Handlers;
    //lokalizacja pliku php to /usr/local/etc/php/php.ini-X i jakies okreslenie pliku
    // jest tam dev i prod
    // \ przed funkcja pozwala na uruchomienie funkcji spoza namespace
    class DBHandler{
        private $conn;
        private DBHandler $self_ref;

        //host=sheep port=5432 dbname=test user=lamb password=bar
        public function __construct()
        {
            $conn_config = "pgsql:host=ec2-52-208-221-89.eu-west-1.compute.amazonaws.com port=5432 dbname=d9f2f1ecoovtv9 user=azihykruoohwpl password=9a93dc5f02ba41c35c0368010924d5de0c27e2b3ace1a0dfcae95abc37a3e0b9";
            $this->conn = new \PDO($conn_config);
        }
    }
