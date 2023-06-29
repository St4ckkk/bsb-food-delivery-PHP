<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Cart</title>
    <link rel="icon" href="img/cooking.png" type="image/x-icon">
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
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_nav.php' ?>
    <?php
    if ($loggedin) {
        function resetCart()
        {
            global $conn, $userId;
            $deletesql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";
            $deleteresult = mysqli_query($conn, $deletesql);
        }

        if (isset($_POST['removeAllItem'])) {
            resetCart();
        }

        if (isset($_POST['removeItem'])) {
            $itemId = $_POST['itemId'];
            $deletesql = "DELETE FROM `viewcart` WHERE `itemId`='$itemId' AND `userId`='$userId'";
            $deleteresult = mysqli_query($conn, $deletesql);
            if (mysqli_affected_rows($conn) > 0) {
                resetCart();
            }
        }
    ?>

        <div class="container" id="cont">
            <div class="row">
                <div class="alert mb-0" style="width: -webkit-fill-available;">
                    <strong>Info!</strong> online payment are currently disabled so please choose cash on delivery.
                </div>
                <div class="col-lg-12 text-center border rounded bg-light my-3">
                    <h1>My Cart</h1>
                </div>
                <div class="col-lg-8">
                    <div class="card wish-list mb-3">
                        <table class="table text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">
                                        <form action="partials/_manageCart.php" method="POST">
                                            <button name="removeAllItem" class="btn btn-sm btn-outline-danger">Remove All</button>
                                            <input type="hidden" name="userId" value="<?php $userId = $_SESSION['userId'];
                                                                                        echo $userId ?>">
                                        </form>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `viewcart` WHERE `userId`= $userId";
                                $result = mysqli_query($conn, $sql);
                                $counter = 0;
                                $totalPrice = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $itemId = $row['itemId'];
                                    $Quantity = $row['itemQuantity'];
                                    $mysql = "SELECT * FROM `items` WHERE itemId = $itemId";
                                    $myresult = mysqli_query($conn, $mysql);
                                    $myrow = mysqli_fetch_assoc($myresult);
                                    $itemName = $myrow['itemName'];
                                    $itemPrice = $myrow['itemPrice'];
                                    $total = $itemPrice * $Quantity;
                                    $counter++;
                                    $totalPrice = $totalPrice + $total;

                                    echo '<tr>
                                            <td>' . $counter . '</td>
                                            <td  style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">' . $itemName . '</td>
                                            <td>' . $itemPrice . '</td>
                                            <td>
                                                <form id="frm' . $itemId . '">
                                                    <input type="hidden" name="itemId" value="' . $itemId . '">
                                                    <input type="number" name="quantity" value="' . $Quantity . '" class="text-center" onchange="updateCart(' . $itemId . ')" onkeyup="return false" style="width:60px" min=1 oninput="check(this)" onClick="this.select();">
                                                </form>
                                            </td>
                                            <td>' . $total . '</td>
                                            <td>
                                                <form action="partials/_manageCart.php" method="POST">
                                                    <button name="removeItem" class="btn btn-sm btn-outline-danger">Remove</button>
                                                    <input type="hidden" name="itemId" value="' . $itemId . '">
                                                </form>
                                            </td>
                                        </tr>';
                                }
                                if ($counter == 0) {
                                ?><script>
                                        document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="partials/uploads/emptycart.jpg" width="300" height="300" class="img-fluid mb-4 mr-3"><h3><strong style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent; cursor: pointer;">Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="about.php" class="btn btn-primary cart-btn-transform m-4 btn-lg"  data-abc="true" style="background-image: linear-gradient(to right, #ff9a00, #ff5252); border-color: #ff9a00;">continue shopping</a> </div></div></div></div>';
                                    </script> <?php
                                            }
                                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card wish-list mb-3">
                        <div class="pt-4 border bg-light rounded p-3">
                            <h5 class="mb-3 text-uppercase font-weight-bold text-center">Order summary</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">Total Price<span>₱ <?php echo $totalPrice ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                    <div>
                                        <strong>The total amount of</strong>
                                        <strong>
                                            <p class="mb-0">(including Tax & Charge)</p>
                                        </strong>
                                    </div>
                                    <span><strong>₱<?php echo $totalPrice ?></strong></span>
                                </li>
                            </ul>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cash On Delivery
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" disabled>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Online Payment
                                </label>
                            </div><br>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkoutModal">go to checkout</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="pt-4">
                            <a class="dark-grey-text d-flex justify-content-between" style="text-decoration: none; color: #050607;" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Add a discount code (optional)
                                <span><i class="fas fa-chevron-down pt-1"></i></span>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <div class="mt-3">
                                    <div class="md-form md-outline mb-0">
                                        <input type="text" id="discount-code" class="form-control font-weight-light" placeholder="Enter discount code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
        echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Before checkout you need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div>';
    }
    ?>
    <?php require 'partials/_checkoutModal.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
        }

        function updateCart(id) {
            $.ajax({
                url: 'partials/_manageCart.php',
                type: 'POST',
                data: $("#frm" + id).serialize(),
                success: function(res) {
                    location.reload();
                }
            })
        }
    </script>
</body>

</html>