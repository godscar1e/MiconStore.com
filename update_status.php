<?php

session_start();

if (isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'logged_in', 'email' => $_SESSION['email']]);
} else {
    echo json_encode(['status' => 'not_logged_in']);
}

?>