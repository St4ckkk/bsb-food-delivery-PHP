<?php
include '_dbconnect.php';
session_start();
$userId = $_SESSION['userId'];

if (isset($_POST["updateProfilePic"])) {
    if (isset($_FILES["image"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $newfilename = "profile-" . $userId . ".jpg";
            $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/OnlineFoodDelivery/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                echo "<script>alert('Profile picture updated successfully.');</script>";
            } else {
                echo "<script>alert('Failed to upload image. Please try again.');</script>";
            }
        } else {
            echo '<script>alert("Please select a valid image file to upload.");</script>';
        }
    }
    echo "<script>window.location=document.referrer;</script>";
}

if (isset($_POST["updateProfileDetail"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $passSql = "SELECT * FROM users WHERE id='$userId'";
    $passResult = mysqli_query($conn, $passSql);
    $passRow = mysqli_fetch_assoc($passResult);

    if (password_verify($password, $passRow['password'])) {
        $sql = "UPDATE `users` SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `phone` = '$phone' WHERE `id` ='$userId'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>alert("Profile details updated successfully.");</script>';
        } else {
            echo '<script>alert("Failed to update profile details. Please try again.");</script>';
        }
    } else {
        echo '<script>alert("Incorrect password. Please try again.");</script>';
    }
    echo "<script>window.history.back(1);</script>";
}

if (isset($_POST["removeProfilePic"])) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/OnlineFoodDelivery/img/profile-" . $userId . ".jpg";
    if (file_exists($filename)) {
        if (unlink($filename)) {
            echo "<script>alert('Profile picture removed successfully.');</script>";
        } else {
            echo "<script>alert('Failed to remove profile picture. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('No profile picture available to remove.');</script>";
    }
    echo "<script>window.location=document.referrer;</script>";
}
