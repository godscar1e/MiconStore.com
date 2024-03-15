<?php
session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
include('login');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Registration Action</title>
</head>

<body>
    <?php include('header.php'); ?>

    <main class="main">
        <div class="main-container _container">
            <p class="main__title">CHOOSE AN ACTION</p>
            <div class="main__buttons mainbttns">
                <a class="mainbttns__specialist-button" href="clientregistration.php">
                    <img class=" clientimg" src="./img/clientact.png" alt="">
                    <div class="label">
                        <p>Order a service</p>
                    </div>
                </a>

                <a class="mainbttns__specialist-button" href="specregistration.php">
                    <img class=" specialistimg" src=" ./img/specact.png" alt="">
                    <div class="label">
                        <p>Start earning</p>
                    </div>
                </a>
            </div>

            <?php include('modal.php'); ?>
        </div>
    </main>
    <script src="././js/loginreturn.js"></script>
    <script src="././js/logout.js"></script>
    <script src="././js/modal.js"></script>
    <script src="././js/profiledrop.js"></script>
    <script src="././js/succsessmodal.js"></script>
</body>

</html>