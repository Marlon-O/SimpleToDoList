<?php
    include 'includes/class-autoloader.inc.php';

    $todos = new TodoView();
    $res = $todos->getTodo();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>To Do List</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="header">
                <h1 class="title">To Do <span id="title-span">List</span></h1>
                <i title="Add New" class="fa fa-plus add-icon add-todo-icon" aria-hidden="true"></i>
            </div>

            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>To Do</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if ($res) { for ($i=0; $i<count($res); $i++) { ?>
                        <tr>
                            <!-- <td><?php echo $res[$i]['ID'] ?></td> -->
                            <td><?php echo $res[$i]['content'] ?></td>
                            <td>
                                <input type="hidden" name="todo__id" id="todo__id_field" value="<?php echo $res[$i]['ID'] ?>">
                                <a class="modify-button delete-button"><i title="Done" class="fa fa-check" aria-hidden="true"> Done</i></a> |
                                <a href="index.php?id=<?php echo $res[$i]['ID'] ?>&data=<?php echo $res[$i]['content'] ?>" class="modify-button edit-button"><i title="Edit" class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i></a>
                            </td>
                        </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for Add -->
    <div class="modal-container add-modal">
        <div class="modal">
            <div class="header">
                <h1>Add new To<span class="dos">Dos</span></h1>
            </div>
            <i title="Close" class="fa fa-times close-icon" aria-hidden="true"></i>
            <div class="content">
                <form action="includes/receiver.inc.php" method="POST">
                    <label for="todos"><h3>Type here your work</h3></label>
                    <textarea name="todos" id="todos" cols="30" rows="5"></textarea>
                    <button type="submit" name="submit" id="submit" class="submit-btn">Post</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Delete -->
    <div class="modal-container delete-modal">
        <div class="modal">
            <div class="header">
                <i title="Close" class="fa fa-times close-icon" aria-hidden="true"></i>
            </div>
            <div class="content">
                <h3>Please confirm that the task you have selected is done.</h3>
                <p id="hidden_container" style="display:none;"></p>
                <div class="confirmation-container delete-form">
                    <form action="includes/receiver.inc.php" method="POST" id="confirm-form">
                        <input type="hidden" name="todo_id_delete" id="todo_id_delete">
                        <input type="submit" name="submit" class="confirm-button yes-button" value="Yes">
                        <button class="confirm-button no-button">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Update -->
    <div class="modal-container update-modal">
        <div class="modal">
            <div class="header">
                <i title="Close" class="fa fa-times update-close-icon" aria-hidden="true"></i>
            </div>
            <div class="content">
                <h3>Edit Task</h3>
                <p id="hidden_container" style="display:none;"></p>
                <div class="confirmation-container update-form">
                    <form action="includes/receiver.inc.php" method="POST" id="confirm-form">
                        <input type="hidden" name="todo_id_update" id="todo_id_delete" value="<?php echo $_GET['id'] ?>">
                        <textarea name="todos" id="todos" cols="30" rows="5"><?php echo $_GET['data'] ?></textarea>
                        <input type="submit" name="submit" class="confirm-button yes-button" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/main.js"></script>
</body>
</html>