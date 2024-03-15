<div class="modal" id="loginModal">
    <div class="modal-content">
        <h1 class="loginformlabel">Login Form</h1>
        <form class="loginForm" action="login.php" method="post" onsubmit="loginReturn(event);">
            <input type="text" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="pass" required>
            <label id="errorLabel" for=""></label>
            <button type="submit">Sign in</button>
        </form>

        <a class="to-reg-form-btn" href="regaction.php">Do not have an account?</a>
    </div>
</div>



<div class="modal-overlay" id="overlay" onclick="closeModal()"></div>

<div class="successmodal" id="successRegModal">
    <div class="successmodal-content">
        <img src="./img/icons/successchekmark.png" alt="">
        <p>Registration successful!<br> Log in to your account</p>
    </div>
</div>

<div class="successmodal" id="successLogModal">
    <div class="successmodal-content">
        <img src="./img/icons/successchekmark.png" alt="">
        <p>Login successful!<br> Welcome to NexusIT!</p>
    </div>
</div>

<div class="chatmodalbutton" id="chatModalButton">
    <button onclick="openChatModal()">
        <img src="./img/icons/chaticon.svg" alt="">
    </button>
</div>

<div class="chatmodal" id="chatModal">
    <div class="chatmodal-content chatmodalcontent">
        <div class="chatmodalcontent__greetings" id="chatWindowOne">
            <h1>Greetings! ✋</h1>
            <h2>Have a question? We are always happy to help during business hours!</h2>
            <?php
                    $loggedIn = isset($_SESSION['user_id']);
                    if ($loggedIn) {
                        echo ' <button class="chatmodal__startconver" onclick="expandChatModal()">Start a conversation</button>';
                    } else {
                        echo '<button class="chatmodal__startconver" onclick="openModal()">Start a conversation</button>';
                    }
            ?>
            <button onclick="closeModal()">
                <img src="./img/icons/crossicon.svg" alt="">
            </button>
        </div>
        <div class="chatmodalcontent__chat chat" id="chatWindowChat">
            <div class="chat__head">
                <button id="chat__arrowback" onclick="decreaseChatModal()">
                    <img src="./img/icons/arrowback.svg" alt="">
                </button>
                <h1>Support service</h1>
                <img class="chat__logo" src="./img/logo/logowhite.svg" alt="">
            </div>
            <div class="chat__main-chat" id="mainChat"></div>
            <div class="chat__foot">
                <input type="text" id="messageInput" placeholder="Enter your message" onkeydown="handleKeyDown(event)">
            </div>
        </div>
    </div>
</div>