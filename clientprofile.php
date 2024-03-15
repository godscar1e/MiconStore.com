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
    <link rel="stylesheet" href=".././css/clientprofile.css">

    <title>NexusIT</title>
</head>

<body>
    <?php include('header.php'); ?>

    <main class="main">
        <div class="main-container _container">
            <div class="main__block mainblock">
                <aside class="mainblock__leftside leftsideblock">
                    <h1 class="leftsideblock__caption">My Account</h1>
                    <div class="leftsideblock__list list">
                        <button class="list__item active" onclick="toggleActive(this, 'profileForm')">Change
                            Profile</button>
                        <button class="list__item" onclick="toggleActive(this, 'changepassForm')">Change
                            Password</button>
                        <button class="list__item" onclick="toggleActive(this, 'ordersList')">Your Orders</button>
                    </div>
                    <button class="leftsideblock__exit" onclick="confirmLogout()">Exit</button>
                </aside>
                <div class=" mainblock__rightside rightsideblock">
                    <div class="rightsideblock__profilepic">
                        <img id="profileImage" src="" alt="">
                        <input type="file" id="photoInput" style="display: none" accept="image/*">
                        <button class="changephotobtn" onclick="document.getElementById('photoInput').click()">Change
                            Photo</button>
                    </div>
                    <?php include('clientforms\clientprofileform.php'); ?>
                    <?php include('clientforms\clientpasschange.php'); ?>
                    <?php include('clientforms\clientorders.php'); ?>
                </div>
            </div>
        </div>
    </main>
    <script src="././js/buttonactive.js"></script>
    <script src="././js/formbutton.js"></script>
    <script src="././js/logout.js"></script>
    <script src="././js/modal.js"></script>
    <script src="././js/profiledrop.js"></script>
</body>

</html>