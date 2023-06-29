<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="htmlcss bootstrap menu, navbar, mega menu examples" />
    <meta name="description" content="Bootstrap navbar examples for any type of project, Bootstrap 4" />

    <title>Profile</title>
    <link rel="icon" href="img/cooking.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
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

        .footer {
            padding: 10px 0;
        }

        #notfound {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .notfound .notfound-404 {
            font-size: 230px;
            font-weight: bold;
            color: #ff9a00;
        }

        .notfound .notfound-404 span {
            color: #ff5252;
        }

        .card-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .card-container .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-container .card .card-body {
            padding: 30px;
        }

        .card-container .card .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card-container .card ul {
            list-style-type: none;
            padding-left: 0;
        }

        .card-container .card ul li {
            margin-bottom: 10px;
        }

        .card-container .card ul li a {
            text-decoration: none;
            color: #333;
        }

        .card-container .card ul li a:hover {
            color: #ff9a00;
        }

        .card-container .card .form-group label {
            font-weight: bold;
        }

        .card-container .card .form-group .input-group-prepend {
            background-color: transparent;
            border: none;
        }

        .card-container .card .form-group .input-group-text {
            background-color: transparent;
            border: none;
            color: #333;
            font-weight: bold;
        }

        .card-container .card .form-group .form-control {
            border: none;
            border-radius: 0;
            box-shadow: none;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            transition: border-color 0.3s ease-in-out;
        }

        .card-container .card .form-group .form-control:focus {
            border-color: #ff9a00;
            box-shadow: none;
        }

        .card-container .card .form-group .btn-primary {
            background-color: #ff9a00;
            border-color: #ff9a00;
        }

        .card-container .card .form-group .btn-primary:hover {
            background-color: #ff5252;
            border-color: #ff5252;
        }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_nav.php' ?>
    <?php
    if ($loggedin) {
    ?>

        <div class="container card-container">
            <?php
            $sql = "SELECT * FROM users WHERE id='$userId'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $phone = $row['phone'];
            $userType = $row['userType'];
            if ($userType == 0) {
                $userType = "User";
            } else {
                $userType = "Admin";
            }
            ?>
            <div class="row my-3">
                <div class="col-12 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="rounded-circle mb-3 bg-dark" src="img/profile-<?php echo $userId; ?>.jpg" onError="this.src = 'img/profilePic.png'" style="width: 215px; height: 215px; padding: 1px;">
                            </div>
                            <form action="partials/_manageProfile.php" method="POST">
                                <small>Remove Image: </small>
                                <button type="submit" class="btn btn-primary btn-sm" name="removeProfilePic">Remove</button>
                            </form>
                            <form name="upload-form" action="partials/_manageProfile.php" method="POST" enctype="multipart/form-data" style="margin-top: 7px;">
                                <div class="upload-btn-wrapper">
                                    <small>Change Image:</small>
                                    <button class="btn btn-secondary btn-sm">Choose</button>
                                    <input type="file" name="image" id="image" accept="image/*">
                                </div>
                                <button type="submit" name="updateProfilePic" class="btn btn-primary btn-sm" style="margin-top: -20px;">Update</button>
                            </form>

                            <ul class="list-unstyled">
                                <li class="my-2"><a href="viewProfile.php">@<?php echo $username ?></a></li>
                                <li class="my-2">
                                    <div class="d-flex align-items-center">

                                        <p class="mb-0"><?php echo "Name: " . $firstName . " " . $lastName; ?> <span class="badge badge-info"><?php echo $userType ?></span></p>
                                    </div>
                                </li>
                                <li class="my-2">
                                    <div class="d-flex align-items-center">

                                        <p class="mb-0"><?php echo "Email: " . $email ?></p>
                                    </div>
                                </li>
                                <li class="my-2 text-center"><a href="partials/_logout.php" class="btn btn-secondary btn-sm">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title mb-3">Profile</h2>
                            <form action="partials/_manageProfile.php" method="post">
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input class="form-control" id="username" name="username" type="text" disabled value="<?php echo $username ?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="firstName">First Name:</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required value="<?php echo $firstName ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastName">Last Name:</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" required value="<?php echo $lastName ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required value="<?php echo $email ?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone No:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon">+63</span>
                                            </div>
                                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10" value="<?php echo $phone ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Password:</label>
                                        <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required minlength="4" maxlength="21" data-toggle="password">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="updateProfileDetail" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
        echo '<div id="notfound">
                <div class="notfound">
                    <div class="notfound-404">
                        <h1>Oops!</h1>
                    </div>
                    <h2>404 - Page not found</h2>
                    <a href="index.php">Go To Homepage</a>
                </div>
            </div>';
    }
    ?>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.1.1/dist/bootstrap-show-password.min.js"></script>
</body>

</html>