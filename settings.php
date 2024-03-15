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
    <link rel="stylesheet" href="./css/style.css">
    <title>NexusIT</title>
</head>

<body>
    <?php include('header.php'); ?>

    <main class="main">
        <div class="main-container _container">

        </div>
    </main>

    <script src="././js/logout.js"></script>
    <script src="././js/modal.js"></script>
    <script src="././js/profiledrop.js"></script>
    <script src="././js/succsessmodal.js"></script>
</body>

</html>