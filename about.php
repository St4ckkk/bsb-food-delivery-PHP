<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <title>Home</title>
  <link rel="icon" href="img/cooking.png" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="stylesheet" href="assets/css/viewPizzaList.css">
  <style>
    body {
      background-image: url(img/bgcontatct.jpg);
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      height: 100%;
      margin: 0;

    }

    .category-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .card {
      margin: 1rem;
      border: none;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card-img-top {
      object-fit: cover;
      height: 200px;
    }

    .card-body {
      background-color: #fff;
      padding: 1.5rem;
    }

    .card-title {
      margin-bottom: 0.5rem;
      font-size: 1.25rem;
      font-weight: bold;
    }

    .card-text {
      color: #6c757d;
      font-size: 0.875rem;
      line-height: 1.5;
      height: 4.5rem;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .btn-primary-primary {
      color: white;
      background-image: linear-gradient(to right, #ff9a00, #ff5252);
      border-color: #ff9a00;
    }

    /* Add hover effect to the button */
    .btn-primary-primary:hover {
      color: white;
      background-image: linear-gradient(to right, #ff5252, #ff9a00);
      border-color: #ff5252;
    }

    btn-primary-primary.active {
      border-color: #FFA500;
      /* Set border color for active state */
    }
  </style>
</head>

<body>
  <?php include 'partials/_dbconnect.php'; ?>
  <?php require 'partials/_nav.php' ?>

  <!-- Category container starts here -->
  <div class="container my-3 mb-5">
    <div class="col-lg-2 text-center bg-light my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black; background-image: linear-gradient(to right, #ff9a00, #ff5252);">
      <h2 class=" text-center text-white my-3">Menu</h2>
    </div>
    <div class="row category-container">
      <!-- Fetch all the categories and use a loop to iterate through categories -->
      <?php
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['categorieId'];
        $cat = $row['categorieName'];
        $desc = $row['categorieDesc'];
        echo
        '<div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
              <img src="img/cat-' . $id . '.jpg" class="card-img-top img-fluid" alt="image for this category">
              <div class="card-body">
                <h5 class="card-title" style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"><a href="viewPizzaList.php?catid=' . $id . '">' . $cat . '</a></h5>
                <p class="card-text">' . substr($desc, 0, 120) . '...</p>
                <a href="viewPizzaList.php?catid=' . $id . '" class="btn btn-primary-primary">View All</a>
              </div>
            </div>
          </div>';
      }
      ?>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>

</html>