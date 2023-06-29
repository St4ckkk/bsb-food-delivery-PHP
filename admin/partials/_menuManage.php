<?php
include '_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $categoryId = $_POST["categoryId"];
        $price = $_POST["price"];

        $sql = "INSERT INTO `items` (`itemName`, `itemPrice`, `itemDesc`, `itemCategoryId`, `itemPubDate`) VALUES ('$name', '$price', '$description', '$categoryId', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $itemId = $conn->insert_id;
        if ($result) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {

                $newName = 'item-' . $itemId;
                $newfilename = $newName . ".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/OnlineFoodDelivery/img/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('Success');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('Failed');
                            window.location=document.referrer;
                        </script>";
                }
            } else {
                echo '<script>alert("Please select an image file to upload.");
                        window.location=document.referrer;
                    </script>';
            }
        } else {
            echo "<script>alert('Failed');
                    window.location=document.referrer;
                </script>";
        }
    }
    if (isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `items` WHERE `itemId`='$itemId'";
        $result = mysqli_query($conn, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/OnlineFoodDelivery/img/item-" . $itemId . ".jpg";
        if ($result) {
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Removed');
                window.location=document.referrer;
            </script>";
        } else {
            echo "<script>alert('Failed');
            window.location=document.referrer;
            </script>";
        }
    }
    if (isset($_POST['updateItem'])) {
        $itemId = $_POST["itemId"];
        $itemName = $_POST["name"];
        $itemDesc = $_POST["desc"];
        $itemPrice = $_POST["price"];
        $itemCategoryId = $_POST["catId"];

        $sql = "UPDATE `items` SET `itemName`='$itemName', `itemPrice`='$itemPrice', `itemDesc`='$itemDesc', `itemCategoryId`='$itemCategoryId' WHERE `itemId`='$itemId'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Updated');
                window.location=document.referrer;
                </script>";
        } else {
            echo "<script>alert('Failed');
                window.location=document.referrer;
                </script>";
        }
    }
    if (isset($_POST['updateItemPhoto'])) {
        $itemId = $_POST["itemId"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if ($check !== false) {
            $newName = 'item-' . $itemId;
            $newfilename = $newName . ".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/OnlineFoodDelivery/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('Success');
                        window.location=document.referrer; window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('Failed');
                        window.location=document.referrer;
                    </script>";
            }
        } else {
            echo '<script>alert("Please select an image file to upload.");
            window.location=document.referrer;
                </script>';
        }
    }
}
