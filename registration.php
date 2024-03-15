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
    <title>NexusIT</title>
</head>

<body>
    <?php include('header.php'); ?>

    <main class="main">
        <div class="main-container _container">
            <div class="registration-block regblock">
                <h1 class="regblock__label">Registration of a specialist</h1>
                <form class="regblock__form regform" action="register.php" method="post">
                    <div class="regform__buttons regbtns">
                        <button class="regbtns__privatebtn">Private Specialist</button>
                        <button class="regbtns__companybtn">Company</button>
                    </div>
                    <input type="text" placeholder="Name" name="name"> <br>
                    <input type="text" placeholder="Phone" name="phone"><br>
                    <input type="text" placeholder="Email" name="email"><br>
                    <input type="text" placeholder="City" name="city">
                    <input type="text" placeholder="Password" name="pass">
                    <input type="text" placeholder="Repeat Password" name="repeatpass">
                    <div class="checkbox-container">
                        <input type="checkbox" name="rules"> I agree with the <a href="#">rules</a> of service
                    </div>
                    <button class="submitreg" type="submit">Sign up</button>
                    <p class="ifhaveacc">
                        Already have an account,
                        <a id="loginLink" href="#">login</a>
                    </p>
                </form>

                <?php include('modal.php'); ?>
            </div>
        </div>
    </main>


    <script src="././js/main.js"></script>
    <script src="././js/modal.js"></script>
    <script src="././js/profiledrop.js"></script>
    <script src="././js/succsessmodal.js"></script>
</body>

</html>