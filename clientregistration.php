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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>NexusIT</title>
</head>

<body>
    <?php include('header.php'); ?>

    <main class="main">
        <div class="main-container _container">
            <div class="registration-block regblock">
                <h1 class="regblock__label">Registration of a client</h1>
                <form id="registrationForm" class="regblock__form regform" action="register.php" method="post"
                    onsubmit="validateForm(event);">
                    <input type="text" placeholder="Name" name="name" onkeypress="return /[a-zA-Z]/.test(event.key)"
                        required> <br>
                    <input id="phone" type="text" placeholder="Phone" name="phone" required><br>
                    <label id="phoneErrorLabel" class="errorLabel"
                        style="display: none; margin: -15px 0 5px; color: red;">
                        Invalid phone number format
                    </label>
                    <input type="text" id="email" placeholder="Email" name="email"
                        onkeypress="return /[a-zA-Z0-9!@#$%^&*()_+{}\[\]:;<>,.?~\\/\-]/.test(event.key)" required>
                    <br>
                    <label id="errorEmailMessage" style=" display: none; margin: -15px 0 5px; color: red;"></label>
                    <p class="regform__label-acc-exists">An account with this email
                        already
                        exists!</p>
                    <input type="text" id="city" placeholder="City" name="city"
                        onkeypress="return /[a-zA-Z]/.test(event.key)" required>
                    <input type="password" placeholder="Password" name="pass" required>
                    <label id="passwordErrorLabel" class="errorLabel"
                        style="display: none; margin: -15px 0 5px; color: red;">
                        <ul>
                            <li> At least 8 characters</li>
                            <li>Contain special characters</li>
                            <li> Capital letters</li>
                        </ul>
                    </label>
                    <div class="checkbox-container">
                        <input type="checkbox" name="rules"> I agree with the <a href="#">rules</a> of service
                    </div>
                    <button class="submitreg" type="submit" id="submitBtn">Sign up</button>
                    <p class="ifhaveacc">
                        Already have an account,
                        <a id="loginLink" href="#">login</a>
                    </p>
                    <input type="hidden" name="user_type" value="client">
                </form>

                <?php include('modal.php'); ?>
            </div>
        </div>
    </main>
    <script src="././js/regreturn.js"></script>
    <script src="././js/logout.js"></script>
    <script src="././js/modal.js"></script>
    <script src="././js/formbutton.js"></script>
    <script src="././js/profiledrop.js"></script>
    <script src="././js/successmodal.js"></script>
</body>

</html>