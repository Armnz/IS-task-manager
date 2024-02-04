<h3 class="text-center p-2">Tasks</h3>
  <div class="container">
    <div class="row">
      <?php foreach ($tasks as $task) { ?>
        <div class="col-sm-6 col-md-4 mb-4">
          <div class="card h-100 d-flex flex-column">
            <div class="card-body d-flex flex-column text-center">
              <h6 class="card-title"><?php echo htmlspecialchars($task['task_name']); ?> </h6>
              <div class="card-text mb-auto">
                <?php
                // Ensure the text is safe to display and then limit it to the first 100 characters
                echo htmlspecialchars(mb_substr($task['task_description'], 0, 100));

                // Check if the text was longer than 100 characters and append '...' if it was.
                if (mb_strlen($task['task_description']) > 100) {
                  echo '...';
                }
                ?>
              </div>
              <div class="mt-3 d-flex justify-content-center">
                <a href="#" class="btn btn-info m-2" style="width: auto;">More info</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>