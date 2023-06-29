<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id="title">Category</title>
    <link rel="icon" href="img/cooking.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/viewPizzaList.css">
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

        .jumbotron {
            padding: 2rem 1rem;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Change the button color to a linear gradient */
        .btn-primary {
            background-image: linear-gradient(to right, #ff9a00, #ff5252);
            border-color: #ff9a00;
        }

        /* Add hover effect to the button */
        .btn-primary:hover {
            background-image: linear-gradient(to right, #ff5252, #ff9a00);
            border-color: #ff5252;
        }

        #cont {
            min-height: 570px;
        }

        .card {
            width: 18rem;
        }

        @media (max-width: 576px) {
            .card {
                width: 100%;
            }
        }
    </style>

</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_nav.php' ?>

    <div>&nbsp; &nbsp;
        <a href="about.php" class="active text-dark">
            <i class="fas fa-qrcode text-white"></i>
            <span class="text-white">All Category</span>
        </a>
    </div>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE categorieId = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['categorieName'];
        $catdesc = $row['categorieDesc'];
    }
    ?>

    <!-- Pizza container starts here -->
    <div class="container my-3 mb-5" id="cont">
        <div class="col-lg-3 text-center my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;background-image: linear-gradient(to right, #ff9a00, #ff5252);">
            <h2 class="text-center my-3  text-white"><span id="catTitle">Items</span></h2>

        </div>

        <div class="row ">
            <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `items` WHERE itemCategoryId = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $itemId = $row['itemId'];
                $itemName = $row['itemName'];
                $itemPrice = $row['itemPrice'];
                $itemDesc = $row['itemDesc'];

                echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <img src="img/item-' . $itemId . '.jpg" class="card-img-top mx-auto d-block" alt="image for this food" width="249px" height="270px">
                            <div class="card-body">
                                <h5 class="card-title" style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">' . substr($itemName, 0, 20) . '...</h5>
                                <h6 style="color: #ff0000">₱ ' . $itemPrice . '/-</h6>
                                <p class="card-text">' . substr($itemDesc, 0, 29) . '...</p>   
                                <div class="row justify-content-center">';
                if ($loggedin) {
                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE itemId = '$itemId' AND `userId`='$userId'";
                    $quaresult = mysqli_query($conn, $quaSql);
                    $quaExistRows = mysqli_num_rows($quaresult);
                    if ($quaExistRows == 0) {
                        echo '<form action="partials/_manageCart.php" method="POST">
                                              <input type="hidden" name="itemId" value="' . $itemId . '">
                                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>';
                    } else {
                        echo '<a href="viewCart.php"><button class="btn btn-primary mx-2">Go to Cart</button></a>';
                    }
                } else {
                    echo '<button class="btn btn-primary mx-2" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
                }
                echo '</form>                            
                                <a href="viewPizza.php?itemid=' . $itemId . '" class="mx-2"><button class="btn btn-primary">Quick View</button></a> 
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            if ($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Sorry, no items available in this category.</p>
                        <p class="lead">We will update soon.</p>
                    </div>
                </div> ';
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
    <script>
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>";
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>";
    </script>
</body>

</html>