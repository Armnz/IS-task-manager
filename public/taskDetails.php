<?php

include('../config/db_connect.php');

$task = null;

// check GET request id param
if(isset($_GET['id'])){
  
  // Escape the id to prevent SQL injection
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  // Prepare the SQL statement
  $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = ?");
  
  // Bind the id parameter to the prepared statement
  $stmt->bind_param("i", $id); // 'i' denotes the type of the parameter, i.e., integer
  
  if ($stmt->execute()) {
    
    $result = $stmt->get_result();
  
    // Fetch result in array format
    $task = $result->fetch_assoc();

    $result->free();
  }
  
  $stmt->close();
  
  $conn->close();
}

?>

<!DOCTYPE html>
<html>

<?php include('../components/header.php'); ?>

<div class="container text-center">
    <?php if($task): ?>
        <h3 class="pt-4 mb-0  text-success"><?php echo htmlspecialchars($task['task_name']); ?></h3>
        <p class="small p-0 m-0"><?php echo date($task['created_at']); ?> </p>
        <p class="p-4 m-2 bg-white"><?php echo htmlspecialchars($task['task_description']); ?></p>

        <!-- delete form -->
        <form action="../functions/deleteTask.php" method="POST">
          <input type="hidden" name="id_to_delete" value="<?php echo $task['id'] ?>">
          <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>
    <?php else: ?>
        <h3 class="text-danger mt-6">No such task exists!</h3>
    <?php endif; ?>
</div>

<?php include('../components/footer.php'); ?>

</html>
