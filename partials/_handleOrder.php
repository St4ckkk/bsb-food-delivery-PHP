<?php
include '_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['removeItem'])) {
        $itemId = $_POST["orderId"];
        $sql = "DELETE FROM `orders` WHERE `orderId`='$itemId'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>alert("Item removed successfully.");
            window.location=document.referrer;
            </script>';
        } else {
            echo '<script>alert("Failed to remove item. Please try again.");
            window.location=document.referrer;</script>';
        }
    }
}
