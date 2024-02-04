<?php

include('../config/db_connect.php');

// write SQL query for all tasks
$sql = 'SELECT task_name, task_description, id FROM tasks ORDER BY created_at';

// make SQL query & get results
$result = mysqli_query($conn, $sql);

// fetch resulting rows as an array
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('../components/header.php'); ?>

<h2 class="text-center p-4 text-success">Tasks</h2>

<?php include('../components/taskList.php'); ?>

<?php include('../components/footer.php'); ?>

</html>