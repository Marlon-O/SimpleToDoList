<?php

    class TodoView extends TodoCtrl {

        public function getTodo () {
            $result = $this->fetchData();

            if (!$result) {
                return false;
            }

            return $result;
        }

        public function insertTodo ($todo, $date) {
            $result = $this->insertData($todo, $date);

            return $result;
        }

        public function updateTodo ($id, $todo, $date) {
            $result = $this->updateData($id,$todo, $date);
            
            return $result;
        }

        public function deleteTodo ($id) {
            $result = $this->deleteData($id);
            return $result;
        }

    }