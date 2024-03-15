function toggleProfileMenu() {
    var profileMenu = document.getElementById('profileMenu');
    profileMenu.classList.toggle('show');
}

document.addEventListener('click', function (event) {
    var profileMenu = document.getElementById('profileMenu');
    var profileBtn = document.querySelector('.header-btns__profilebtn');

    if (profileBtn && !profileBtn.contains(event.target) && !profileMenu.contains(event.target)) {
        profileMenu.classList.remove('show');
    }
});

