<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id="title">Food</title>
    <link rel="icon" href="img/cooking.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        body {
            background-image: url(img/bgcontatct.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 91.2vh;
            margin: 0;

        }


        #cont {
            min-height: 80%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background-image: linear-gradient(to right, #ff9a00, #ff5252);
            border-color: #ff9a00;
        }

        /* Add hover effect to the button */
        .btn-primary:hover {
            background-image: linear-gradient(to right, #ff5252, #ff9a00);
            border-color: #ff5252;
        }

        .img-fluid {
            height: 100%;
            width: 100%;
            /* Adjust the width as per your requirement */
        }

        .jumbotron {
            background-color: white;
            /* Adjust the color as per your preference */
        }

        @media (max-width: 576px) {
            body {
                background-image: url(img/bgcontatct.jpg);
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                height: 100%;
                margin: 0;

            }
        }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_nav.php' ?>

    <div class="container my-4 mx-auto" id="cont">
        <div class="row jumbotron justify-content-center">
            <?php
            $itemId = $_GET['itemid'];
            $sql = "SELECT * FROM `items` WHERE itemId = $itemId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $itemName = $row['itemName'];
            $itemPrice = $row['itemPrice'];
            $itemDesc = $row['itemDesc'];
            $itemCategoryId = $row['itemCategoryId'];
            ?>
            <script>
                document.getElementById("title").innerHTML = "<?php echo $itemName; ?>";
            </script>
            <?php
            echo  '<div class="col-md-4">
                <img src="img/item-' . $itemId . '.jpg" class="img-fluid" alt="Food Image">
            </div>
            <div class="col-md-8 my-4">
                <h3  style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">' . $itemName . '</h3>
                <h5 style="color: #ff0000">₱' . $itemPrice . '/-</h5>
                <p class="mb-0 text-black">' . $itemDesc . '</p>';

            if ($loggedin) {
                $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE itemId = '$itemId' AND `userId`='$userId'";
                $quaresult = mysqli_query($conn, $quaSql);
                $quaExistRows = mysqli_num_rows($quaresult);
                if ($quaExistRows == 0) {
                    echo '<form action="partials/_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="' . $itemId . '">
                              <button type="submit" name="addToCart" class="btn btn-primary my-2">Add to Cart</button>';
                } else {
                    echo '<a href="viewCart.php"><button class="btn btn-primary my-2">Go to Cart</button></a>';
                }
            } else {
                echo '<button class="btn btn-primary my-2" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
            }
            echo '</form>
                <h6 class="my-1"> View </h6>
                <div class="mx-4">
                    <a href="viewPizzaList.php?catid=' . $itemCategoryId . '" class="active text-dark">
                        <i class="fas fa-qrcode"  style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                        <span  style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">All Food</span>
                    </a>
                </div>
                <div class="mx-4">
                    <a href="about.php" class="active text-dark">
                        <i class="fas fa-qrcode"  style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                        <span  style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">All Category</span>
                    </a>
                </div>
            </div>'
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