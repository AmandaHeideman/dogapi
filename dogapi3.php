 <!------- dogapi.php ------->

<?php include "app.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Dogs</title>
</head>

<body class="container">

  <!-- Writes chosen dog breed as headline -->
  <div class="header p-3 mt-3 mb-3">
    <?php
    $breed = $_GET['breed'] ?? "Choose a dog breed";
    $subbreed = $_GET['subbreed'] ?? null;
    echo "<h1>" . ucfirst($breed) . " " . ucfirst($subbreed) . "</h1>";
    ?>
  </div>

  <div class="d-flex">

    <!-- Block that lists dog breeds -->
    <div class="list">
      <?php App::main(); ?>
    </div>

    <!-- Block that shows images of specific breed -->
    <div class="images">
      <?php App::viewImages(); ?>
    </div>

  </div>
</body>

</html>
