<?php

include('login');
require_once('db.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$loginIsSuccessful = true;

// After successful login, fetch user_type from the database
if ($loginIsSuccessful && isset($_SESSION['user_id'])) {
    // Fetch user_type from the database based on the user's ID or email
    $userId = $_SESSION['user_id'];
    $userType = getUserTypeFromDatabase($conn, $userId);

    // Set user_type in the session
    $_SESSION['user_type'] = $userType;
}

function getUserTypeFromDatabase($conn, $userId) {
    if (empty($userId)) {
        return null;
    }

    $sql = "SELECT user_type FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        return $row['user_type'];
    }

    // Close the statement
    $stmt->close();

    return null;
}
?>

<header class="header">
    <div class="header-container _container">
        <div class="header__body">
            <div class="header__logo">
                <a href="index.php">
                    <img src="./img/logo/logowhite.svg" alt="">
                </a>
            </div>
            <div class="header__buttons header-btns">
                <?php if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) : ?>
                <?php if (basename($_SERVER['PHP_SELF']) !== 'regaction.php' && basename($_SERVER['PHP_SELF']) !== 'registration.php') : ?>
                <button class="header-btns__signinbtn" id="signinbtn" onclick="openModal()">Sign in</button>
                <?php endif; ?>
                <?php else : ?>
                <button class="header-btns__profilebtn" onclick="toggleProfileMenu()">
                    <img src="./img/icons/profile.svg" alt="">
                </button>
                <div class="profile-menu" id="profileMenu">
                    <div class="profile-menu__buttons menu__btns">
                        <a href="order.php">order</a>
                        <button
                            <?php echo ($_SESSION['user_type'] == 'client') ? 'class="menu__btns__client-btn menu__selected-btn"' : 'class="menu__btns__client-btn"' ?>
                            id="client__btn">Client</button>

                        <button
                            <?php echo ($_SESSION['user_type'] == 'specialist') ? 'class="menu__btns__specialist-btn menu__selected-btn"' : 'class="menu__btns__specialist-btn"' ?>
                            id="spec__btn">Specialist</button>

                    </div>
                    <a href="clientprofile.php" style="display: block;">My Orders</a>
                    <a href="clientprofile.php" style="display: block;">Notifications</a>
                    <a href="clientprofile.php" style="display: block;">Settings</a>
                    <button class="profile-menu__logoutbtn" onclick="confirmLogout()"
                        style="display: block;">Logout</button>
                </div>
                <button class="header-btns__logoutbtn" id="logoutbtn" onclick="confirmLogout()">Logout</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>