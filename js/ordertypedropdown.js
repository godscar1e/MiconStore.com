document.addEventListener('DOMContentLoaded', function () {
    var dropdown = document.querySelector('.dropdown');
    var dropbtn = dropdown.querySelector('.dropbtn');

    dropdown.addEventListener('click', function (event) {
        var listItem = event.target.closest('.dropdown-content li');
        if (listItem) {
            var selectedText = listItem.innerText;

            // Устанавливаем текст кнопки
            dropbtn.innerText = `Selected: ${selectedText}`;

            dropdown.classList.remove('show-content');
        } else {
            dropdown.classList.toggle('show-content');
        }
    });

    document.addEventListener('click', function (event) {
        if (!dropdown.contains(event.target)) {
            dropdown.classList.remove('show-content');
        }
    });
});
