<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Admin Dashboard</title>
    <style>
        .gradient-bg:hover {
            transform: translateZ(20px);
        }
    </style>
</head>

<body class="bg-white">
    <div class="container-fluid">
        <div class="content mt-5">
            <?php
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "OPD";

            $conn = mysqli_connect($server, $username, $password, $database);
            if (!$conn) {
                die("Error" . mysqli_connect_error());
            }
            $itemsQuery = "SELECT COUNT(*) AS item_count FROM items";
            $itemsResult = mysqli_query($conn, $itemsQuery);
            $itemCount = mysqli_fetch_assoc($itemsResult)['item_count'];

            $categoriesQuery = "SELECT COUNT(*) AS category_count FROM categories";
            $categoriesResult = mysqli_query($conn, $categoriesQuery);
            $categoryCount = mysqli_fetch_assoc($categoriesResult)['category_count'];
            // Retrieve the delivered items from the orders table

            $deliveredItemsQuery = "SELECT COUNT(*) AS delivered_count FROM delivereditems";
            $deliveredItemsResult = mysqli_query($conn, $deliveredItemsQuery);
            $deliveredCount = mysqli_fetch_assoc($deliveredItemsResult)['delivered_count'];

            $userQuery = "SELECT COUNT(*) AS user_count FROM users";
            $userResult = mysqli_query($conn, $userQuery);
            $userCount = mysqli_fetch_assoc($userResult)['user_count'];

            $salesSql = "SELECT IFNULL(SUM(amount), 0) AS totalSales FROM sales";
            $salesResult = mysqli_query($conn, $salesSql);
            $salesRow = mysqli_fetch_assoc($salesResult);
            $totalSales = $salesRow['totalSales'];


            $orderQuery = "SELECT COUNT(*) AS order_count FROM orders";
            $orderResult = mysqli_query($conn, $orderQuery);
            $orderData = mysqli_fetch_assoc($orderResult);
            $orderCount = $orderData['order_count'];

            $orderStatusQuery = "SELECT orderStatus FROM orders";
            $orderStatusResult = mysqli_query($conn, $orderStatusQuery);

            while ($orderStatusData = mysqli_fetch_assoc($orderStatusResult)) {
                if ($orderStatusData['orderStatus'] == 4) {
                    $orderCount--;
                }
            }





            // Insert the delivered items into the delivered_items table
            /* while ($row = mysqli_fetch_assoc($result)) {
            $orderId = $row['id'];
            $itemName = $row['itemName'];
            $itemPrice = $row['itemPrice'];
            $amount = $row['amount'];
            $
            $customer_name = $row['customer'];
            $price = $row['price'];
            $delivery_date = date('Y-m-d'); // Assuming the delivery date is the current date

            $insertQuery = "INSERT INTO delivered_items (order_id, product_name, customer_name, price, delivery_date)
                    VALUES ('$order_id', '$product_name', '$customer_name', '$price', '$delivery_date')";
            mysqli_query($connection, $insertQuery);
        }*/
            ?>
        </div>
    </div>
    <div class="d-flex" id="wrapper">
        <div class="container-fluid px-4">
            <div class="row g-3 my-2">
                <div class="col-md-3 col-sm-6">
                    <div class="p-3 bg-primary bg-gradient shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $itemCount; ?></h3>
                            <p class="fs-5">Items</p>
                        </div>
                        <i class="fas fa-hotdog fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="p-3 bg-secondary bg-gradient shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $categoryCount; ?></h3>
                            <p class="fs-5">Categories</p>
                        </div>
                        <i class="fas fa-list-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="p-3 bg-danger bg-gradient shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $deliveredCount; ?></h3>
                            <p class="fs-5">Delivered</p>
                        </div>
                        <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="p-3 bg-warning bg-gradient shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $userCount; ?></h3>
                            <p class="fs-5">Users</p>
                        </div>
                        <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="p-3 bg-info bg-gradient shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $orderCount; ?></h3>
                            <p class="fs-5">Orders</p>
                        </div>
                        <i class="fas fa-shopping-cart fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-3 bg-success bg-gradient shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">₱<?php echo $totalSales; ?></h3>
                            <p class="fs-5">Sales</p>
                        </div>
                        <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

            </div>

            <div class="row my-5">
                <h3 class="fs-4 mb-3">Recent Orders</h3>
                <div class="col">
                    <table class="table bg-white rounded shadow-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="50">#</th>
                                <th scope="col ">Product</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $server = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "OPD";

                            $conn = mysqli_connect($server, $username, $password, $database);

                            // Check if the connection is successful
                            if ($conn) {
                                // Fetch the order data from the database
                                $sql = "SELECT itemdetails, firstName, lastName, amount
                                FROM delivereditems";


                                $result = mysqli_query($conn, $sql);

                                // Loop through the query results and display the data dynamically
                                if (mysqli_num_rows($result) > 0) {
                                    $index = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $itemdetails = $row['itemdetails'];
                                        $firstName = $row['firstName'];
                                        $lastName = $row['lastName'];
                                        $amount = $row['amount'];
                                        $fullName = $firstName . ' ' . $lastName;
                            ?>
                                        <tr>
                                            <th scope="row"><?php echo $index; ?></th>
                                            <td><?php echo $itemdetails; ?></td>
                                            <td><?php echo $fullName; ?></td>
                                            <td><?php echo '₱' .  ' ' . $amount; ?></td>
                                        </tr>
                            <?php
                                        $index++;
                                    }
                                } else {
                                    // No orders found in the database
                                    echo "<tr><td colspan='4'>No orders found.</td></tr>";
                                }

                                // Close the database connection
                                mysqli_close($conn);
                            } else {
                                // Error in establishing the database connection
                                echo "Failed to connect to the database.";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>




        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>