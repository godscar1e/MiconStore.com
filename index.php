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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">

    <title>NexusIT</title>
</head>

<body>

    <?php include('header.php'); ?>

    <main class="main">
        <div class="main-container _container">
            <img class="main__bg" src="./img/mainbg.png" alt="">
            <div class="main__center-rect"></div>
            <div class="grid-container">
                <div class="order-type">
                    <img src="./img/icons/ordertypes/design-icon.svg" alt="">
                    <p>Design</p>
                </div>
                <div class="order-type">
                    <img src="./img/icons/ordertypes/prog-icon.svg" alt="">
                    <p>Programming</p>
                </div>
                <div class="order-type">
                    <img src="./img/icons/ordertypes/sysadm-icon.svg" alt="">
                    <p>System administration</p>
                </div>
                <div class="order-type">
                    <img src="./img/icons/ordertypes/pcserv-icon.svg" alt="">
                    <p>PC service</p>
                </div>
                <div class="order-type">
                    <img src="./img/icons/ordertypes/windows-icon.svg" alt="">
                    <p>PC service</p>
                </div>
                <div class="order-type">
                    <img src="./img/icons/ordertypes/prog-icon.svg" alt="">
                    <p>Programming</p>
                </div>
                <div class="order-type">
                    <img src="./img/icons/ordertypes/smthelse-icon.svg" alt="">
                    <p>Something else</p>
                </div>
            </div>

            <div class="main__howwework-block howweworkblock">
                <h1 class="howweworkblock__label">How NexusIT works</h1>
                <div class="howweworkblock__steps ordersteps">
                    <div class="ordersteps__step">
                        <img src="./img/write-hand.png" alt="">
                        <h2>Create an order</h2>
                        <h3 class="step-caption">
                            Describe what needs to be done and when
                        </h3>
                    </div>
                    <div class="ordersteps__step">
                        <img src="./img/consultant.png" alt="">
                        <h2>Choose a specialist</h2>
                        <h3 class="step-caption">
                            Choose a competent specialist to do the job
                        </h3>
                    </div>
                    <div class="ordersteps__step">
                        <img src="./img/like-hand.png" alt="">
                        <h2>Close the order</h2>
                        <h3 class="step-caption">
                            Leave a review and rating for the work done
                        </h3>
                    </div>
                </div>
            </div>

            <div class="main__search search">
                <h2 class="search__label">Didn't find the service you were looking for? Use the search!</h2>
                <div class="search__bar">
                    <input type="text">
                </div>
            </div>

            <div class="main__help-block helpblock">
                <img src="./img/helpblock.png" alt="">
                <div class="helpblock__caption">
                    <h1>Help with the selection of a suitable specialist?</h1>
                    <h3>Hello, quickly create an order and within 10 minutes, and we will find a better specialist.</h3>
                    <button>Order</button>
                </div>
            </div>

            <div class="main__orderlink orderlink">
                <?php
                    $loggedIn = isset($_SESSION['user_id']);

                    if ($loggedIn) {
                        echo '<p class="orderlink__link">
                                <a href="order.php">Create an order</a> right now and find a specialist in minutes!</p>';
                    } else {
                        echo '<p class="orderlink__link" onclick="openModal()">
                                <a>Create an order</a> right now and find a specialist in minutes!</p>';
                    }
                ?>

            </div>
            <?php include('modal.php'); ?>
        </div>
    </main>
    <script src="././js/loginreturn.js"></script>
    <script src="././js/logout.js"></script>
    <script src="././js/modal.js"></script>
    <script src="././js/profiledrop.js"></script>
    <script src="././js/successmodal.js"></script>
</body>

</html>