<?php

include('../config/db_connect.php');

$task_name = $task_description = '';
$errors = array('task_name' => '', 'task_description' => '');

if (isset($_POST['submit'])) {

    // check name
    if (empty($_POST['task_name'])) {
        $errors['task_name'] = 'A name is required <br />';
    } else {
        $task_name = $_POST['task_name'];
        if (!preg_match('/^[A-Za-z0-9 ]*$/', $task_name)) {
            $errors['task_name'] = 'Name must be letters, numbers, and spaces only';
        }
    }

    // check description
    if (empty($_POST['task_description'])) {
        $errors['task_description'] = 'At least one word is required <br />';
    } else {
        $task_description = $_POST['task_description'];
        if (!preg_match('/^(?=.*\b[a-zA-Z]{2,}\b)(?=.*\.).+$/', $task_description)) {
            $errors['task_description'] = 'Description has to have at least one word and one period sign.';
        }
    }

    if (!array_filter($errors)) {
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO tasks (task_name, task_description) VALUES (?, ?)");
        $stmt->bind_param("ss", $task_name, $task_description);

        // set parameters and execute
        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];

        if ($stmt->execute()) {
            // success -> redirect to index
            header('Location: ../public/index.php');
        } else {
            // error
            echo 'Query error: ' . mysqli_error($conn);
        }
        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html>

<?php include('../components/header.php'); ?>

<section class="container my-4">
    <h4 class="text-center">Add a Task</h4>
    <form action="addTask.php" method="POST">
        <div class="mb-3">
            <label for="taskName" class="form-label">Task name</label>
            <input type="text" class="form-control" id="taskName" name="task_name" value="<?php echo htmlspecialchars($task_name); ?>"> <!-- protection against XSS attack -->
            <div class="text-danger"><?php echo $errors['task_name'] ?? ''; ?></div>
        </div>
        <div class="mb-3">
            <label for="taskDescription" class="form-label">Task description</label>
            <input type="text" class="form-control" id="taskDescription" name="task_description" value="<?php echo htmlspecialchars($task_description); ?>">
            <div class="text-danger"><?php echo $errors['task_description'] ?? ''; ?></div>
        </div>
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</section>

<?php include('../components/footer.php'); ?>

</html>
