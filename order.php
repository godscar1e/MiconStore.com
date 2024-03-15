<?php
session_start();
// include('login');
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form was submitted

    // Retrieve data from the form
    $category = $_POST['category']; // Replace with the actual name attribute of the category dropdown
    $shortDescription = $_POST['shortDescription'];
    $detailedDescription = $_POST['detailedDescription'];
    $fulfillmentDate = $_POST['fulfillmentDate']; // Replace with the actual name attribute of the date input
    $costOfWork = $_POST['costOfWork']; // Replace with the actual name attribute of the cost input
    $priceNegotiable = isset($_POST['priceNegotiable']) ? 1 : 0; // Check if the checkbox is checked

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO orders (category, short_description, detailed_description, fulfillment_date, cost_of_work, price_negotiable) 
    VALUES (?, ?, ?, ?, ?, ?)";


    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "ssssdi", $category, $shortDescription, $detailedDescription, $fulfillmentDate, $costOfWork, $priceNegotiable);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Record added successfully";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="./css/order.css">

    <title>NexusIt</title>
</head>

<body>
    <?php include('header.php'); ?>

    <main class="main">
        <div class="main-container _container">
            <form class="orderform" action="" method="post">
                <div class="orderform__category section">
                    <h1 class="sectiontitle">Choose an order category</h1>
                    <div class="dropdown">
                        <button class="dropbtn">Select an option
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <li data-value="Design">Design</li>
                            <li data-value="Programming">Programming</li>
                            <li data-value="System administration">System administration</li>
                            <li data-value="PC service">PC service</li>
                            <li data-value="SPC service">SPC service</li>
                            <li data-value="System administration">System administration</li>
                        </div>
                    </div>


                </div>
                <div class="orderform__details section">
                    <h1 class="sectiontitle">Order details</h1>
                    <div class="miniform">
                        <div class="form-row">
                            <label for="shortDescription">What should be done? (short)</label>
                            <input type="text" name="shortDescription" id="shortDescription" required>
                        </div>
                        <div class="form-row">
                            <label for="detailedDescription">Describe your order in detail</label>
                            <textarea type="text" name="detailedDescription" id="detailedDescription"
                                required></textarea>
                        </div>
                    </div>

                </div>
                <div class="orderform__date section">
                    <h1 class="sectiontitle">Order fulfillment date</h1>
                    <input type="date" name="" id="" required>
                </div>
                <div class="orderform__payment section">
                    <h1 class="sectiontitle">Payment of work</h1>
                    <div class="form-row">
                        <label for="">Cost of work:
                            (oriented)</label>
                        <input class="price-input" type="number" name="" id="" required>
                        <p>$.</p>
                    </div>
                    <div class="checkbox-container">
                        <input type="checkbox" name="" id="">
                        <label class="checkbox-label" for="">Price is negotiable</label>
                    </div>
                </div>
                <button type="submit">Publish</button>
            </form>
        </div>
    </main>
    <?php include('modal.php'); ?>
    <script src="./js/ordertypedropdown.js"></script>
    <script src="./js/filterdrop.js"></script>
    <script src="././js/loginreturn.js"></script>
    <script src="././js/logout.js"></script>
    <script src="././js/modal.js"></script>
    <script src="././js/profiledrop.js"></script>
    <script src="././js/successmodal.js"></script>

</body>

</html>