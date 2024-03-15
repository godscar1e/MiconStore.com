function loginReturn(event) {
    event.preventDefault(); // Prevent the default form submission

    var loginForm = document.querySelector('.loginForm');
    var loginData = new FormData(loginForm);
    var errorLabel = document.getElementById('errorLabel');

    // Check if all fields are filled
    if (!loginData.get('email') || !loginData.get('pass')) {
        // Display the "Fill all the fields" message
        errorLabel.textContent = 'Fill all the fields';
        errorLabel.style.display = 'block';
        return; // Exit the function without making the Axios request
    }

    axios.post('login.php', loginData)
        .then(function (response) {
            // Handle successful login
            console.log(response.data);

            if (response.data.status === 'success') {
                // Save loginStatus to localStorage
                localStorage.setItem('loginStatus', 'success');

                // Redirect to index.php after a successful login
                redirectToIndex();
            } else {
                // Display the error message or a default message
                errorLabel.innerHTML = response.data.message || 'Incorrect login or password!';
                errorLabel.style.display = 'block';
            }
        })
        .catch(function (error) {
            // Handle errors
            console.error(error);

            // Display the "Incorrect login or password!" message
            errorLabel.innerHTML = 'Incorrect login or password!';
            errorLabel.style.display = 'block';
        });

    function redirectToIndex() {
        // Use a timeout to ensure that localStorage is updated before navigating
        setTimeout(function () {
            window.location.href = 'http://localhost:3000/index.php';
        }, 100);
    }
}

// Attach the loginReturn function to the form's onsubmit event
var loginForm = document.querySelector('.loginForm');
loginForm.addEventListener('submit', loginReturn);

function updateStatus() {
    // Use AJAX to request the current user status
    axios.get('update_status.php')
        .then(function (response) {
            if (response.data.status === 'logged_in') {
                console.log("You are logged in as " + response.data.email);
            } else {
                console.log("You are not logged in");
            }
        })
        .catch(function (error) {
            console.error(error);
        });
}

// Call the updateStatus function every second
setInterval(updateStatus, 1000);
