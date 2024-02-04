  <div class="container">
    <div class="row">
      <?php foreach ($tasks as $task): ?>
        <div class="col-sm-6 col-md-4 mb-4">
          <div class="card h-100 d-flex flex-column">
            <div class="card-body d-flex flex-column text-center">
              <h5 class="card-title text-success"><?php echo htmlspecialchars($task['task_name']); ?> </h5>
              <div class="card-text mb-auto">
                <?php
                // Ensure the text is safe to display and then limit it to the first 100 characters
                echo htmlspecialchars(mb_substr($task['task_description'], 0, 100));

                // Check if the text was longer than 100 characters and add '...' if it was.
                if (mb_strlen($task['task_description']) > 100):
                  echo '...';
                endif
                ?>
              </div>
              <div class="mt-3 d-flex justify-content-center">
                <a href="details.php?id=<?php echo $task['id']?>" class="btn btn-success m-2" style="width: auto;">More info</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>

    </div>
  </div>