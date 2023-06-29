<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <title>Home</title>
  <link rel="icon" href="partials/uploads/cooking.png" type="image/x-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/custom.css">
  <style>
    body {
      background-image: url(img/bgcontatct.jpg);
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      height: 100%;
      margin: 0;

    }

    #cont {
      min-height: 626px;
    }

    .btn-primary {
      background-image: linear-gradient(to right, #ff9a00, #ff5252);
      border-color: #ff9a00;
    }

    .btn-primary:hover {
      background-image: linear-gradient(to right, #ff5252, #ff9a00);
      border-color: #ff5252;
    }

    .reviews .card {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 0 auto;
      max-width: 400px;
      /* Adjust the value as needed */

      /* Adjust the value as needed */
      perspective: 1000px;
      position: relative;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
    }



    .reviews .rating {
      font-size: 24px;
      margin-bottom: 10px;
      font-weight: 700;
    }

    .reviews .review-text {
      font-size: 16px;
      margin-bottom: 10px;
      text-align: left;
      /* Updated to left alignment */
    }

    .reviews .user {
      font-size: 14px;
      color: #999;
      font-style: italic;

    }

    .btn-slide {
      background: linear-gradient(to right, #ff9a00, #ff5252);
      border-color: transparent;
      transition: 0.5s;
    }

    .btn-slide:hover {
      background: transparent;
      transition: 0.5s;


    }
  </style>
</head>

<body class="index-body">
  <?php include 'partials/_dbconnect.php'; ?>
  <?php include 'partials/_nav.php'; ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="carousel-background"><img src="assets/img/slide/880043.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown mb-0">
                  <span class="txt-slide" style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    Savor The Sweet Moments With Ice Cream!
                  </span>
                </h2>
                <p class="animate__animated animate__fadeInDown"><span id="txt-slide-desc">Indulge in a wide variety of handcrafted ice creams, and frozen treats. From classic flavors to unique creations, our ice cream delights will satisfy any sweet tooth.</span></p>
                <a href="about.php" class="btn animate__animated animate__fadeInUp scrollto btn-slide">Order Now</a>
              </div>
            </div>
          </div>
          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="assets/img/slide/img2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown mb-0">
                  <span class="txt-slide" style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    Satisfy Your Cravings With Delicious Filipino Street Foods!
                  </span>
                </h2>
                <p class="animate__animated animate__fadeInUp"><span id="txt-slide-desc">Treat yourself to the savory delights of Isaw (grilled chicken or pork intestines on skewers), Balut (boiled duck embryo), and Kwek-Kwek (deep-fried quail eggs coated in orange batter). Sample the crispy goodness of Fishballs and Squidballs dipped in flavorful sauces</span></p>
                <a href="index.php" class="btn animate__animated animate__fadeInUp scrollto btn-slide">Order Now</a>
              </div>
            </div>
          </div>
          <!-- Slide 3 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="assets/img/slide/img3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown mb-0">
                  <span class="txt-slide" style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    Experience The Best Of Fast Food Delights!
                  </span>
                </h2>

                <p class="animate__animated animate__fadeInUp"><span id="txt-slide-desc">Delight in a diverse range of mouthwatering options, including pizza, burgers, and an array of other tantalizing fast foods.</span></p>
                <a href="index.php" class="btn animate__animated animate__fadeInUp scrollto btn-slide">Order Now</a>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-thin-double-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-thin-double-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <section class="reviews">
      <div class="container">
        <div class="section-title">
          <h2>Reviews</h2>
        </div>

        <!-- Display Reviews -->
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div id="review-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php
                // Retrieve reviews from the database
                $sql = "SELECT * FROM reviews";
                $result = mysqli_query($conn, $sql);

                $count = 0;

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $review = $row['review'];
                    $rating = $row['rating'];
                    $username = $row['username'];
                    $userId = $row['userId']; // Assuming userId is a column in the reviews table

                    $active = ($count == 0) ? 'active' : '';

                    $ratingStars = '';
                    for ($i = 1; $i <= $rating; $i++) {
                      $ratingStars .= '<i class="fas fa-star" style="color: yellow"></i>';
                    }
                    for ($i = $rating + 1; $i <= 5; $i++) {
                      $ratingStars .= '<i class="far fa-star" style="color: yellow"></i>';
                    }

                    echo '<div class="carousel-item ' . $active . '">';
                    echo '<div class="card shadow">';
                    echo '<div class="card-body">';
                    echo '<div class="text-center">';
                    echo '<img class="rounded-circle mb-3 bg-dark" src="img/profile-' . $userId . '.jpg" onError="this.src = \'img/profilePic.png\'" style="width: 215px; height: 215px; padding: 1px;">';
                    echo '</div>';
                    echo '<h5 class="card-title">' . $username . '</h5>';
                    echo '<div class="rating-circle">' . $rating . ' out of 5</div>'; // Updated line
                    echo '<div class="card-subtitle mb-2 text-muted">' . $ratingStars . '</div>'; // Updated line
                    echo '<p class="card-text">' . $review . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    $count++;
                  }
                } else {
                  echo '<p>No reviews yet.</p>';
                }
                ?>
              </div>


              <a class="carousel-control-prev" href="#review-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#review-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>








  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>