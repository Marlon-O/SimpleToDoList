<?php
    include 'DB_Connect.class.php';

    class TodoCtrl extends DB_Connect {

        public function fetchData () {
            $sql = "SELECT * FROM info";
            $result = $this->connect()->query($sql);
            $array = [];
            
            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
            return $array;
        }
        
        public function insertData ($todo_content, $todo_date) {
            $sql = "INSERT INTO info (ID, content, date_created) 
                    VALUES (null, '$todo_content', '$todo_date')";
            
            $result = $this->connect()->query($sql);

            // $sql = "INSERT INTO info (content, date_created) 
            //         VALUES (?, ?)";
            
            // $result = $this->connect()->prepare($sql);

            // $result->bind_param("ss", $todo_content, $todo_date);

            // $result->execute();

            return $result;
        }

        public function deleteData ($id) {
            $sql = "DELETE FROM info WHERE ID = '$id'";
            $result = $this->connect()->query($sql);

            return $result;
        }

        public function updateData ($id, $todo, $date) {
            $sql = "UPDATE info
                    SET content = '$todo', date_created = '$date'
                    WHERE ID = $id";
            $result = $this->connect()->query($sql);

            return $result;
        }
    }