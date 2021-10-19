<?php
    include 'class-autoloader.inc.php';

    $todos = new TodoView();
    if (isset($_POST['submit'])) {
        if (isset($_POST['todos']) && !isset($_POST['todo_id_update'])) {
            $todo = $_POST['todos'];
            $data = new Todo($todo);

            $res = $todos->insertTodo($data->todo_content, $data->date);

            if (!$res) {
                echo 'Erorr: ' .$res .'<br>' .$res->error;
            }
        }

        if (isset($_POST['todo_id_delete'])) {
            $id = $_POST['todo_id_delete'];
            $res = $todos->deleteTodo($id);

            if (!$res) {
                echo 'Erorr: ' .$res .'<br>' .$res->error;
            }
        }

        if (isset($_POST['todo_id_update']) && isset($_POST['todos'])) {
            $id = $_POST['todo_id_update'];
            $data = $_POST['todos'];
            $date = date("Y-m-d H:i:s");

            $res = $todos->updateTodo($id, $data, $date);

            if (!$res) {
                echo 'Erorr: ' .$res .'<br>' .$res->error;
            }
        }
    }

    header ('Location: ../index.php');