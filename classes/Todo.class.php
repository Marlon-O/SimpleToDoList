<?php
    class Todo {
        public $todo_content;
        public $date;

        public function __construct($todo_content) {
            $this->todo_content = $todo_content;
            $this->date = date("Y-m-d H:i:s");
        }
    }