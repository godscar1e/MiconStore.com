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
    <link rel="stylesheet" href="./css/allorders.css">
    <title>Document</title>
</head>

<body>
    <?php include('header.php'); ?>

    <main class="main">
        <div class="main-container _container">
            <div class="main__body mainbody">
                <div class="mainbody__upper">
                    <h1>
                        Category:
                        <label for="">category</label>
                    </h1>
                </div>
                <div class="mainbody__ordersbody ordersbody">
                    <div class="ordersbody__orders orders">
                        <div class="order">
                            <img class="order-img" src="./img/mainbg.png" alt="">
                            <div class="order__info orderinfo">
                                <h3 class="orderinfo__name">Lorem ipsum bdsm machine</h3>
                                <p class="orderinfo__caption">
                                    Вчасно та професійно виконаю диплом для ЧМ Можу відповідати по вихідним та бути на
                                    зв’язку цілобудово Вчасно та професійно виконаю диплом для ЧМ Можу відповідати по
                                    вихідним та бути на зв’язку цілобудово Вчасно та професійно виконаю диплом для ЧМ
                                    Можу
                                    відповідати по вихідним та бути на зв’язку цілобудово Вчасно та професійно виконаю
                                    диплом для ЧМ Можу відповідати по вихідним та бути на зв’язку цілобудово Вчасно та
                                    професійно виконаю о виконаю... виконаю....
                                </p>
                            </div>
                            <p class="order__price">1.250$</p>
                        </div>
                        <div class="order">
                            <img class="order-img" src="./img/mainbg.png" alt="">
                            <div class="order__info orderinfo">
                                <h3 class="orderinfo__name">Lorem ipsum bdsm machine</h3>
                                <p class="orderinfo__caption">
                                    Вчасно та професійно виконаю диплом для ЧМ Можу відповідати по вихідним та бути на
                                    зв’язку цілобудово Вчасно та професійно виконаю диплом для ЧМ Можу відповідати по
                                    вихідним та бути на зв’язку цілобудово Вчасно та професійно виконаю диплом для ЧМ
                                    Можу
                                    відповідати по вихідним та бути на зв’язку цілобудово Вчасно та професійно виконаю
                                    диплом для ЧМ Можу відповідати по вихідним та бути на зв’язку цілобудово Вчасно та
                                    професійно виконаю о виконаю... виконаю....
                                </p>
                            </div>
                            <p class="order__price">1.250$</p>
                        </div>
                        <div class="order">
                            <img class="order-img" src="./img/mainbg.png" alt="">
                            <div class="order__info orderinfo">
                                <h3 class="orderinfo__name">Lorem ipsum bdsm machine</h3>
                                <p class="orderinfo__caption">
                                    Вчасно та професійно виконаю диплом для ЧМ Можу відповідати по вихідним та бути на
                                    зв’язку цілобудово Вчасно та професійно виконаю диплом для ЧМ Можу відповідати по
                                    вихідним та бути на зв’язку цілобудово Вчасно та професійно виконаю диплом для ЧМ
                                    Можу
                                    відповідати по вихідним та бути на зв’язку цілобудово Вчасно та професійно виконаю
                                    диплом для ЧМ Можу відповідати по вихідним та бути на зв’язку цілобудово Вчасно та
                                    професійно виконаю о виконаю... виконаю....
                                </p>
                            </div>
                            <p class="order__price">1.250$</p>
                        </div>

                    </div>
                    <aside class="ordersbody__filters">
                        <h2>Other categories:</h2>
                        <div class="dropdown">
                            <button onclick="myFunction('dropdown1')" class="dropbtn">IT</button>
                            <div id="dropdown1" class="dropdown-content">
                                <a href="#about">About</a>
                                <a href="#base">Base</a>
                                <a href="#blog">Blog</a>
                                <a href="#contact">Contact</a>
                                <a href="#custom">Custom</a>
                                <a href="#support">Support</a>
                                <a href="#tools">Tools</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button onclick="myFunction('dropdown2')" class="dropbtn">Design</button>
                            <div id="dropdown2" class="dropdown-content">
                                <a href="#about">1</a>
                                <a href="#base">2</a>
                                <a href="#blog">3</a>
                                <a href="#contact">Contact</a>
                                <a href="#custom">Custom</a>
                                <a href="#support">Support</a>
                                <a href="#tools">Tools</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button onclick="myFunction('dropdown3')" class="dropbtn">IT</button>
                            <div id="dropdown3" class="dropdown-content">
                                <a href="#about">About</a>
                                <a href="#base">Base</a>
                                <a href="#blog">Blog</a>
                                <a href="#contact">Contact</a>
                                <a href="#custom">Custom</a>
                                <a href="#support">Support</a>
                                <a href="#tools">Tools</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button onclick="myFunction('dropdown4')" class="dropbtn">IT</button>
                            <div id="dropdown4" class="dropdown-content">
                                <a href="#about">About</a>
                                <a href="#base">Base</a>
                                <a href="#blog">Blog</a>
                                <a href="#contact">Contact</a>
                                <a href="#custom">Custom</a>
                                <a href="#support">Support</a>
                                <a href="#tools">Tools</a>
                            </div>
                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </main>
    <?php include('modal.php'); ?>

    <script src="./js/filterdrop.js"></script>
    <script src="././js/loginreturn.js"></script>
    <script src="././js/logout.js"></script>
    <script src="././js/modal.js"></script>
    <script src="././js/profiledrop.js"></script>
    <script src="././js/successmodal.js"></script>
</body>

</html>