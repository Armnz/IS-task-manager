<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <title>Task Manager</title>
  <style>
    body, h1, h2, h3, h4, h5, h6 {
      font-family: 'Roboto', sans-serif;
    }
    .custom-navbar {
      height: 80px;
    }
    .card:hover {
      transform: scale(1.1);
    }
    .card {
      transition: transform 0.5s;
    }
  </style>
</head>

<body class="bg-light d-flex flex-column min-vh-100">

  <nav class="navbar navbar-expand-lg navbar-light bg-white custom-navbar">
    <div class="container">
      <a href="../public/index.php" class="navbar-brand">
        <img src="../public/keyboard-icon.svg" alt="keyboard-icon">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="../functions/addTask.php" class="btn btn-dark">Add Task</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>