document.addEventListener('DOMContentLoaded', function () {
    // Check localStorage for loginStatus
    const loginStatus = localStorage.getItem('loginStatus');

    console.log('loginStatus:', loginStatus);

    if (loginStatus === 'success') {
        // Show the success modal after 2 seconds for login
        setTimeout(() => {
            showLoginSuccessModal();
        }, 1500);

        // Clear loginStatus from localStorage
        localStorage.removeItem('loginStatus');
    }
    const registrationStatus = localStorage.getItem('registrationStatus');

    console.log('registrationStatus:', registrationStatus);

    if (registrationStatus === 'success') {
        // Show the success modal after 2 seconds for registration
        setTimeout(() => {
            showSuccessModal();
        }, 1500);

        // Clear registrationStatus from localStorage
        localStorage.removeItem('registrationStatus');
    }

    const noAccountLabel = document.getElementById('noAccountLabel');
    if (noAccountLabel) {
        noAccountLabel.style.display = 'block';
    }

});

function showLoginSuccessModal() {
    // Show the login success modal
    const loginSuccessModal = document.getElementById('successLogModal');
    loginSuccessModal.style.display = 'block';

    // Add the animate-in class to trigger the transition
    loginSuccessModal.classList.add('animate-in');

    // You may want to add a timeout to hide the modal after a few seconds
    setTimeout(() => {
        // Remove the animate-in class to hide the modal
        loginSuccessModal.classList.remove('animate-in');

        // Hide the modal
        loginSuccessModal.style.display = 'none';
    }, 3000); // Hide after 3 seconds (adjust as needed)
}


function showSuccessModal() {
    // Show the registration success modal
    const successModal = document.getElementById('successRegModal');
    successModal.style.display = 'block';

    // You may want to add a timeout to hide the modal after a few seconds
    setTimeout(() => {
        successModal.style.display = 'none';
    }, 3000); // Hide after 3 seconds (adjust as needed)
}

