let activeButton = null;

function toggleActive(button, formId) {
    let targetElement = document.getElementById(formId);

    if (targetElement) {
        let isSameButton = activeButton === button;

        if (!isSameButton) {
            let activeItems = document.querySelectorAll(".list__item.active");
            activeItems.forEach(function (item) {
                item.classList.remove("active");
            });

            button.classList.add("active");

            // Скрываем все формы и блоки
            let allFormsAndBlocks = document.querySelectorAll('.mainblock__rightside form, .rightsideblock__orders-list');
            allFormsAndBlocks.forEach(function (item) {
                item.style.display = 'none';
            });

            // Показываем выбранный элемент
            targetElement.style.display = "block";

            // Обновляем активный элемент
            activeButton = button;
        }
    }
}

document.getElementById('photoInput').addEventListener('change', function (event) {
    var fileInput = event.target;
    var profileImage = document.getElementById('profileImage');

    if (fileInput.files.length > 0) {
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            profileImage.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
});

function toggleActiveReg(button) {
    // Убираем класс у всех кнопок
    var buttons = document.querySelectorAll('.regform__buttons button');
    buttons.forEach(function (btn) {
        btn.classList.remove('activeButton');
    });

    // Добавляем класс только к нажатой кнопке
    button.classList.add('activeButton');
}