<?php
include '_dbconnect.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['userId'];
    $username = $_SESSION['username'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $password = $_POST["password"];

    $passSql = "SELECT * FROM users WHERE id='$userId'";
    $passResult = mysqli_query($conn, $passSql);
    $passRow = mysqli_fetch_assoc($passResult);

    if (password_verify($password, $passRow['password'])) {
        $sql = "INSERT INTO `reviews` (`userId`, `username`, `rating`, `review`) VALUES ('$userId', '$username', '$rating', '$review')";
        $result = mysqli_query($conn, $sql);
        echo '<script>alert("Thanks for the review!");
                    window.location.href="http://localhost/OnlineFoodDelivery/index.php";  
                    </script>';
        exit();
    } else {
        echo "<script>alert('Password incorrect!!');
                window.history.back(1);
                </script>";
    }
}
