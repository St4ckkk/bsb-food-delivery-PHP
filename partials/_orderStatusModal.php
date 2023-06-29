<style>
    /* .modal-body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif
    } */
    @media (max-width: 767px) {
        .modal-dialog {

            width: 100%;
            height: 100%;

        }

        .btn-warning {
            margin-top: 30px;
        }
    }

    .card {
        width: 100%;
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background-image: linear-gradient(to right, #ff5252, #ff9a00);
        border-color: #ff5252;
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background-image: linear-gradient(to right, #ff5252, #ff9a00);
        border-color: #ff5252;
    }

    .track .step.deactive:before {
        background: #030303;
    }

    .track .step.deactive .icon {
        background: #030303;
        color: #fff
    }

    .track .icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd;
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .btn-warning {
        color: #ffffff;
        background-color: #ee5435;
        border-color: #ee5435;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px
    }
</style>
<?php
$statusmodalsql = "SELECT * FROM `orders` WHERE `userId`= $userId";
$statusmodalresult = mysqli_query($conn, $statusmodalsql);
while ($statusmodalrow = mysqli_fetch_assoc($statusmodalresult)) {
    $orderid = $statusmodalrow['orderId'];
    $status = $statusmodalrow['orderStatus'];
    if ($status == 0)
        $tstatus = "Order Placed.";
    elseif ($status == 1)
        $tstatus = "Order Confirmed.";
    elseif ($status == 2)
        $tstatus = "Preparing your Order.";
    elseif ($status == 3)
        $tstatus = "Your order is on the way!";
    elseif ($status == 4)
        $tstatus = "Order Delivered.";
    elseif ($status == 5)
        $tstatus = "Order Denied.";
    else
        $tstatus = "Order Cancelled.";

    $deliveryDetailSql = "SELECT * FROM `deliverydetails` WHERE `orderId` = $orderid";
    $deliveryDetailResult = mysqli_query($conn, $deliveryDetailSql);
    $deliveryDetailRow = mysqli_fetch_assoc($deliveryDetailResult);

    $deliveryBoyName = ""; // Initialize the variable
    // Function to generate a random tracking number
    function generateRandomTrackingNumber($id)
    {
        // Generate a random string
        $randomString = generateRandomString(10); // Specify the desired length of the tracking number

        // Combine the random string with the id
        $trackingNumber = $randomString . $id;

        return $trackingNumber;
    }

    // Function to generate a random string
    function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    if ($deliveryDetailRow) {
        $trackId = generateRandomTrackingNumber($deliveryDetailRow['id']);
        $deliveryBoyName = $deliveryDetailRow['deliveryBoyName'];
        $deliveryBoyPhoneNo = $deliveryDetailRow['deliveryBoyPhoneNo'];
        $deliveryTime = $deliveryDetailRow['deliveryTime'];
    } else {
        $trackId = generateRandomTrackingNumber($orderid);
        $deliveryBoyName = '';
        $deliveryBoyPhoneNo = '';
        $deliveryTime = 'xx';

        // Store the generated tracking number in the database
        $insertTrackingNumberSql = "INSERT INTO `deliverydetails` (`id`, `orderId`, `deliveryBoyName`, `deliveryBoyPhoneNo`, `deliveryTime`) VALUES ($trackId, '$orderId', '$deliveryBoyName', '$deliveryBoyPhoneNo', '$deliveryTime')";
        mysqli_query($conn, $insertTrackingNumberSql);
    }

?>
    <!-- Modal -->
    <div class="modal fade" id="orderStatus<?php echo $orderid; ?>" tabindex="-1" role="dialog" aria-labelledby="orderStatus<?php echo $orderid; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderStatus<?php echo $orderid; ?>">Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="printThis">
                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                        <article class="card">
                            <div class="card-body">
                                <h6><strong>Order ID:</strong> #<?php echo $orderid; ?></h6>
                                <article class="card">
                                    <div class="card-body row">
                                        <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php echo $deliveryTime; ?> minute </div>
                                        <div class="col"> <strong>Shipping By:</strong> <br> <?php echo $deliveryBoyName; ?> | <i class="fa fa-phone"></i> <?php echo $deliveryBoyPhoneNo; ?> </div>
                                        <div class="col"> <strong>Status:</strong> <br> <?php echo $tstatus; ?> </div>
                                        <div class="col"> <strong>Tracking #:</strong> <br> <?php echo $trackId; ?> </div>
                                    </div>
                                </article>
                                <div class="track">
                                    <?php
                                    if ($status == 0) {
                                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Order Confirmed</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text"> Preparing your Order</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>';
                                    } elseif ($status == 1) {
                                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text"> Preparing your Order</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>';
                                    } elseif ($status == 2) {
                                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Preparing your Order</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>';
                                    } elseif ($status == 3) {
                                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Preparing your Order</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>';
                                    } else if ($status == 4) {
                                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                              <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                              <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Preparing your Order</span> </div>
                                              <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">On the way</span> </div>
                                              <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>';

                                        $checkOrderStatusSql = "SELECT orderStatus FROM orders WHERE orderId = '$orderId'";
                                        $resultOrderStatus = mysqli_query($conn, $checkOrderStatusSql);
                                        $rowOrderStatus = mysqli_fetch_assoc($resultOrderStatus);
                                        $orderStatus = $rowOrderStatus['orderStatus'];

                                        if ($orderStatus == 4) {
                                            // Check if the sales record exists
                                            $checkSalesSql = "SELECT COUNT(*) AS count FROM sales WHERE orderId = '$orderId'";
                                            $resultCheckSales = mysqli_query($conn, $checkSalesSql);
                                            $rowCheckSales = mysqli_fetch_assoc($resultCheckSales);
                                            $countSales = $rowCheckSales['count'];

                                            if ($countSales == 0) {
                                                // Insert sales record
                                                $insertSalesSql = "INSERT INTO sales (orderId, amount) VALUES ('$orderId', '$amount')";
                                                $salesResult = mysqli_query($conn, $insertSalesSql);
                                            }



                                            $checkDeliveredItemsSql = "SELECT COUNT(*) AS count FROM delivereditems WHERE orderId = '$orderId'";
                                            $resultCheckDeliveredItems = mysqli_query($conn, $checkDeliveredItemsSql);
                                            $rowCheckDeliveredItems = mysqli_fetch_assoc($resultCheckDeliveredItems);
                                            $countDeliveredItems = $rowCheckDeliveredItems['count'];

                                            if ($countDeliveredItems == 0) {
                                                // Retrieve item details from items table only for ordered items
                                                $getItemDetailsSql = "SELECT items.itemId, items.itemName, orderitems.itemQuantity FROM items INNER JOIN orderitems ON items.itemId = orderitems.itemId WHERE orderitems.orderId = '$orderId'";
                                                $resultItemDetails = mysqli_query($conn, $getItemDetailsSql);

                                                // Check if any items are found
                                                if (mysqli_num_rows($resultItemDetails) > 0) {
                                                    // Retrieve user details from users table
                                                    $getUserDetailsSql = "SELECT firstName, lastName FROM users WHERE id = '$userId'";
                                                    $resultUserDetails = mysqli_query($conn, $getUserDetailsSql);

                                                    // Check if user details are found
                                                    if (mysqli_num_rows($resultUserDetails) > 0) {
                                                        $userDetails = mysqli_fetch_assoc($resultUserDetails);
                                                        $firstName = $userDetails['firstName'];
                                                        $lastName = $userDetails['lastName'];

                                                        // Initialize an empty string to store the concatenated item details
                                                        $itemdetails = '';

                                                        // Concatenate item details
                                                        while ($rowItemDetails = mysqli_fetch_assoc($resultItemDetails)) {
                                                            $itemName = $rowItemDetails['itemName'];
                                                            $itemQuantity = $rowItemDetails['itemQuantity'];

                                                            // Concatenate the item details
                                                            $itemdetails .= "$itemQuantity $itemName, ";
                                                        }

                                                        $delivery_date = date('Y-m-d');

                                                        $insertDeliveredItemsSql = "INSERT INTO delivereditems (orderId, userId, itemdetails, itemQuantity, amount, firstName, lastName, paymentMode, orderDate, delivery_date) VALUES ('$orderId', '$userId', '$itemdetails', '$itemQuantity', '$amount', '$firstName', '$lastName', '$paymentMode', '$orderDate', '$delivery_date')";

                                                        $deliveredItemsResult = mysqli_query($conn, $insertDeliveredItemsSql);
                                                    }
                                                }
                                            }
                                        }
                                    } elseif ($status == 5) {
                                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                          <div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Order Denied.</span> </div>';
                                    } else {
                                        echo '<div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Order Cancelled.</span> </div>';
                                    }
                                    ?>
                                </div>
                                <a href="contact.php" class="btn btn-danger bg-gradient my-3" data-abc="true">Help <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>