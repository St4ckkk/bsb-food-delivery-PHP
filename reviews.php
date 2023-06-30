<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Reviews and Ratings</title>
    <link rel="icon" href="img/cooking.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/viewPizzaList.css">
    <style>
        body {
            background-image: url(img/bgcontatct.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
        }

        .rating-stars {
            display: inline-block;
        }

        .rating-stars input[type="radio"] {
            display: none;
        }

        .rating-stars label.star {
            font-size: 24px;
            padding: 10px;
            cursor: pointer;
        }

        .rating-stars label.star:hover,
        .rating-stars label.star:hover~label.star {
            color: #ffcc00;
        }

        .rating-stars input[type="radio"]:checked~label.star {
            color: #ffcc00;
        }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_nav.php'; ?>
    <?php if ($loggedin) { ?>
        <!-- Reviews and Ratings Form -->
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Add Review and Rating</h2>
                            <form action="partials/_manageReviews.php" method="POST">
                                <div class="form-group">
                                    <label for="rating">Rating:</label>
                                    <div class="rating-stars">
                                        <input type="radio" id="star5" name="rating" value="5" required />
                                        <label for="star5" class="star"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star4" name="rating" value="4" required />
                                        <label for="star4" class="star"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star3" name="rating" value="3" required />
                                        <label for="star3" class="star"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star2" name="rating" value="2" required />
                                        <label for="star2" class="star"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star1" name="rating" value="1" required />
                                        <label for="star1" class="star"><i class="fas fa-star"></i></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="review">Review:</label>
                                    <textarea class="form-control" id="review" name="review" rows="5" required></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password">Password:</label>
                                    <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password" required>
                                </div>
                                <button type="submit" class="btn btn-primary" style="color: white; background-image: linear-gradient(to right, #ff9a00, #ff5252); border-color: #ff9a00;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
        echo '<div class="container" style="min-height: 610px;">
        <div class="alert alert-info my-3" style="background-color: #242529;">
            <font style="font-size:22px; color: white;"><center>Make a review? You need to <strong style="background-image: linear-gradient(to right, #ff9a00, #ff5252); -webkit-background-clip: text; -webkit-text-fill-color: transparent; cursor: pointer;"><a class="alert-link" data-toggle="modal" data-target="#loginModal"> Login</a></strong></center></font>
        </div></div>';
    } ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>

</html>
