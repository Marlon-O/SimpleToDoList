<?php

    class DB_Connect {
        private $servername = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbName = 'todolist';

        public function connect() {
            // Create Connection
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);

            // Check Connection
            if ($conn->connect_error) {
                die("Connection Failed: " .$conn->connect_error);
            }

            return $conn;
        }
    }