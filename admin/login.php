<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="icon" href="/OnlineFoodDelivery/img/food.png" type="image/x-icon">

    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("assetsForSideBar/img/hero-bg.webp");
            background-size: cover;
            background-position: center;
        }

        .card {
            border: 1px solid #d1d5da;
            border-radius: 6px;
            background-color: #fff;
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.12), 0px 1px 2px rgba(0, 0, 0, 0.24);
            width: 400px;
            max-width: 100%;
            padding: 30px;

            text-align: center;
        }

        .card-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border: 1px solid #d1d5da;
            border-radius: 6px;
            padding: 10px;
            width: 100%;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #1f6feb;
            border-color: #1f6feb;
        }

        .btn-primary:hover {
            background-color: #1861ac;
            border-color: #1861ac;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>

    <title>Login</title>
</head>

<body>
    <div class="card">
        <h2 class="card-title">Sign in</h2>
        <?php
        if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
            echo '<div class="alert alert-warning" role="alert">
                    Invalid credentials
                </div>';
        }
        ?>
        <form action="partials/_handleLogin.php" method="post">
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>