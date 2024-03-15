function registerUser() {
    let username = document.getElementById('regusername').value;
    let password = document.getElementById('regpassword').value;

    let errormessage = document.getElementById('reg-errormsg');

    // Use URLSearchParams to format the data
    const data = new URLSearchParams();
    data.append('username', username);
    data.append('password', password);

    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: data.toString(), // Use toString to properly format the data
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data);
            // Redirect to the same page with a success parameter
            window.location.href = window.location.href + '?registration=success';
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

function signInUser() {
    let username = document.getElementById('signusername').value;
    let password = document.getElementById('signpassword').value;

    const data = new URLSearchParams();
    data.append('username', username);
    data.append('password', password);

    fetch('signin_ajax.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: data.toString(),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Check the response from the server
            if (data.authenticated) {
                checkAuthentication(); // Refresh the UI after successful login
            } else {
                alert('Authentication failed. Please try again.');
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}


function redirectToReg() {
    let regForm = document.getElementById('registrationForm');
    let signForm = document.getElementById('signinForm');

    signForm.style.display = 'none';
    regForm.style.display = 'block';
}

function logout() {
    fetch('php/logout.php', {
        method: 'GET',
    })
        .then(response => {
            // Вместо обработки JSON-ответа, просто перенаправим пользователя на главную страницу
            window.location.href = 'index.html';
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}



document.addEventListener("DOMContentLoaded", function () {

    // Function to check authentication status
    function checkAuthentication() {
        fetch('../index.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const contentType = response.headers.get('content-type');
                if (contentType && contentType.indexOf('application/json') !== -1) {
                    return response.json();
                } else {
                    console.error('Unexpected content type:', contentType);
                    // Handle non-JSON response accordingly, e.g., return an error object
                    return Promise.reject('Unexpected content type: ' + contentType);
                }

            })
            .then(data => {
                console.log('Data received from the server:', data); // Add this line
                // Update UI based on authentication status
                if (typeof data === 'object' && data.authenticated) {
                    document.getElementById('content').innerHTML = `Welcome, ${data.username}! <a href="#" onclick="logout()">Logout</a>`;
                    // Display the login error message for logged-in users
                    document.getElementById('loginErrorMsgContainer').style.display = 'block';
                    // Hide the login form for logged-in users
                    document.getElementById('signinForm').style.display = 'none';
                } else {
                    console.log("You are not logged in");
                    document.getElementById('signinbtn').style.color = 'red';
                    // Hide the login error message for users who are not logged in
                    document.getElementById('loginErrorMsgContainer').style.display = 'none';
                    // Display the login form for users who are not logged in
                    document.getElementById('signinForm').style.display = 'block';
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    // Check authentication status on page load
    checkAuthentication();

    // Rest of your code...


});

