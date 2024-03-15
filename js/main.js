function confirmLogout() {
    // Выводим диалоговое окно с подтверждением
    var confirmResult = confirm("Are you sure you want to log out?");

    if (confirmResult) {
        // Если пользователь подтвердил выход, вызываем функцию logout
        logout();
    }
}

function logout() {
    // Отправим AJAX-запрос на logout.php
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Перенаправим на главную страницу после выхода
            window.location.href = 'index.php';
        }
    };
    xhr.open("GET", "logout.php", true);
    xhr.send();
}

