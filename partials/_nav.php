
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
} else {
  $loggedin = false;
  $userId = 0;
}

$sql = "SELECT * FROM `sitedetail`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$systemName = $row['systemName'];

// Calculate cart count
$countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId";
$countresult = mysqli_query($conn, $countsql);
$countrow = mysqli_fetch_assoc($countresult);
$count = $countrow['SUM(`itemQuantity`)'];
if (!$count) {
  $count = 0;
}

echo '<style>
.navbar-dark .navbar-nav .nav-link:hover {
  background-image: linear-gradient(to right, #ff9a00, #ff5252);
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  transition: 0.5s;
}
.home a{
  color: linear-gradient(to right, #ff9a00, #ff5252);

}

</style>
<nav class="navbar navbar-expand-lg navbar-dark navBg ">
<a class="navbar-brand mb-1 mt-1" href="index.php">
<img src="partials/uploads/cooking.png" alt="Company Logo" class="company-logo">
<span class="company-name ml-2" style="background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-image: linear-gradient(to right, #ff9a00, #ff5252);">' . $systemName . '</span>
</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active home">
            <a class="nav-link" href="index.php" style="background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-image: linear-gradient(to right, #ff9a00, #ff5252);">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
$sql = "SELECT categorieName, categorieId FROM `categories`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  echo '<a class="dropdown-item" href="viewPizzaList.php?catid=' . $row['categorieId'] . '">' . $row['categorieName'] . '</a>';
}
echo '</div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewOrder.php">Your Order</a>
          </li>
          <li class="nav-item"> <!-- Add this section for reviews and ratings -->
          <a class="nav-link" href="reviews.php">Reviews & Ratings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
        </ul>
        <div class="search-wrapper">
           <form method="get" action="search.php" class="form-inline searchForm">
            <div class="search-input">
              <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search" required>
            </div>
            <button class="btn" id="textBtn" type="submit"><i class="fas fa-search"></i></button>
          </form>
        </div>
';

// Display cart count
echo '<a href="viewCart.php">
        <button type="button" class="btn" title="MyCart">
          <svg xmlns="img/cart.svg" width="16" height="15" fill="currentColor" class="bi bi-cart cart " viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
           
            </svg>   <span id="textBtn"><span id="count"> (' . $count . ')</span>
        </button></a>';

if ($loggedin) {
  echo '<div class="d-flex flex-wrap justify-content">
  <ul class="navbar-nav mr-2">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> Welcome ' . $username . '</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="partials/_logout.php">Logout</a>
      </div>
    </li>
  </ul>
  <div class="text-center image-size-small position-relative">
    <a href="viewProfile.php"><img src="img/profile-' . $userId . '.jpg" class="rounded-circle" onError="this.src = \'img/profilePic.png\'" style="width:40px; height:40px"></a>
  </div>
</div>


';
} else {
  echo '
          <button type="button" class="btn"  data-toggle="modal" data-target="#loginModal"><span id="textBtn">Login</span></button>
          <button type="button" class="btn textBtn"  data-toggle="modal" data-target="#signupModal"><span id="textBtn">SignUp</span></button>';
}

echo '</div>
    </nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php>';

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You can now login.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
}
if (isset($_GET['error']) && $_GET['signupsuccess'] == "false") {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> ' . $_GET['error'] . '
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You are logged in
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> Invalid Credentials
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
}
