let phoneMask = null;
console.log("Before IMask initialization:", phoneMask);

document.addEventListener("DOMContentLoaded", function () {
    const phoneInput = document.getElementById("phone");
    const confirmButtonPhone = document.getElementById("confirmButton_phone");

    phoneMask = IMask(phoneInput, {
        mask: [
            {
                mask: '+0 (000) 000-00-00',
                lazy: false,
                country: 'USA',
                startsWith: '1',
                min: 10
            },
            {
                mask: '+000 (00) 000-00-00',
                lazy: false,
                country: 'Ukraine',
                startsWith: '380',
                min: 12
            },
            {
                mask: '+00 (0000) 000-000',
                lazy: false,
                country: 'India',
                startsWith: '91',
                min: 12
            },
            {
                mask: '0000000000000',
                country: 'unknown',
                startsWith: '',
                min: 13
            }
        ],
        dispatch: (appended, dynamicMasked) => {
            const number = (dynamicMasked.value + appended).replace(/\D/g, '');
            const selectedMask = dynamicMasked.compiledMasks.find(m => number.indexOf(m.startsWith) === 0);
            return selectedMask;
        },
    });

    // Attach an event listener to validate phone on input
    phoneInput.addEventListener("input", validatePhoneOnInput);
});

function validatePhoneOnInput() {
    // Check if phoneMask is ready
    if (phoneMask && phoneMask.unmaskedValue) {
        validatePhone(); // Change this line to use validatePhone
    }
}

function toggleButtonVisibility(inputId) {
    let input = document.getElementById(inputId);
    let confirmButton = document.getElementById('confirmButton_' + inputId);

    if (input && confirmButton) {
        if (input.value.trim() !== '') {
            confirmButton.style.width = '114px';
            confirmButton.style.opacity = '1';
        } else {
            confirmButton.style.width = '0';
            confirmButton.style.opacity = '0';
        }
    }
}

function validateForm(event) {
    event.preventDefault();

    console.log("Validating form");

    let isEmailValid = validateEmail();
    let isPasswordValid = validatePassword();

    // Use phoneMask directly
    let isPhoneValid = validatePhone(); // Synchronous validation
    console.log("Form validation results:", isEmailValid, isPasswordValid, isPhoneValid);

    // Check if all validations pass before making the AJAX request
    if (isEmailValid && isPasswordValid && isPhoneValid) {
        // Continue with the rest of your code...
        // (the AJAX request and the remaining part of your submit function)
    } else {
        // Enable the submit button and hide the loading spinner if validations fail
        $("#submitBtn").prop("disabled", false);
        $(".loading-spinner").hide();
    }
}

function validatePassword() {
    var password = document.getElementsByName('pass')[0].value;
    var errorLabel = document.getElementById('passwordErrorLabel');

    if (password.length < 8 || !/(?=.*[A-Z])(?=.*\d)/.test(password)) {
        errorLabel.innerHTML = '<ul><li> At least 8 characters</li><li>Contain special characters</li><li> Capital letters</li></ul>';
        errorLabel.style.display = 'block';
        return false;
    }

    errorLabel.style.display = 'none';
    return true;
}

function validateEmail() {
    let emailInput = document.getElementById('email');
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (emailInput && !emailPattern.test(emailInput.value)) {
        alert("Invalid email format. Please enter a valid email address.");
        emailInput.value = '';
        console.log("Email validation failed");
        return false;
    }

    console.log("Email validation passed");
    return true;
}

async function validatePhone() {
    return new Promise((resolve) => {
        let phoneInput = document.getElementById('phone');
        let phoneValue = phoneInput.value.replace(/\D/g, ''); // Remove non-digit characters

        console.log("Entered phone number:", phoneInput.value); // Log the entered phone number
        console.log("Cleaned phone number:", phoneValue);

        // Extract country code from the cleaned phone number
        let countryCode;

        if (phoneValue.startsWith('1') && phoneValue.length >= 11) {
            countryCode = '1'; // USA
        } else if (phoneValue.startsWith('380') && phoneValue.length >= 12) {
            countryCode = '380'; // Ukraine
        } else if (phoneValue.startsWith('91') && phoneValue.length >= 12) {
            countryCode = '91'; // India
        }

        console.log("Detected country code:", countryCode);

        // Define a mapping of country codes to their minimum lengths
        const countryMinLengths = {
            '1': 11,   // USA (adjusted to the actual minimum length)
            '380': 12,  // Ukraine
            '91': 12   // India
            // Add more country codes as needed
        };

        // Validate the phone number format based on the country code
        const minRequiredLength = countryMinLengths[countryCode];

        console.log("Minimum required length:", minRequiredLength);

        if (minRequiredLength && phoneValue.length >= minRequiredLength) {
            let errorLabel = document.getElementById('phoneErrorLabel');
            errorLabel.style.display = 'none';
            resolve(true);
        } else {
            let errorLabel = document.getElementById('phoneErrorLabel');
            errorLabel.innerHTML = 'Invalid phone number format';
            errorLabel.style.display = 'block';
            resolve(false);
        }
    });
}



$(document).ready(function () {
    $("#registrationForm").submit(async function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Disable the submit button to prevent double submission
        $("#submitBtn").prop("disabled", true);

        // Show loading spinner during the AJAX request
        $(".loading-spinner").show();

        // Validate the form
        let isEmailValid = validateEmail();
        let isPasswordValid = validatePassword();

        // Use await for asynchronous validation
        let isPhoneValid = await validatePhone();

        // Convert the promise result to a boolean value
        isPhoneValid = !!isPhoneValid;

        console.log("Form validation results:", isEmailValid, isPasswordValid, isPhoneValid);

        // Check if all validations pass before making the AJAX request
        if (isEmailValid && isPasswordValid && isPhoneValid) {
            // Make the AJAX request
            $.ajax({
                type: "POST", // or "GET" depending on your server
                url: "your_backend_url", // replace with your backend URL
                data: {
                    email: $("#email").val(),
                    password: $("#password").val(),
                    phone: $("#phone").val()
                    // Add other form fields as needed
                },
                success: function (data) {
                    // Handle successful response
                    console.log("AJAX request successful:", data);
                },
                error: function (error) {
                    // Handle error response
                    console.error("AJAX request error:", error);
                },
                complete: function () {
                    // Enable the submit button and hide the loading spinner after the request is complete
                    $("#submitBtn").prop("disabled", false);
                    $(".loading-spinner").hide();
                }
            });
        } else {
            // Enable the submit button and hide the loading spinner if validations fail
            $("#submitBtn").prop("disabled", false);
            $(".loading-spinner").hide();
        }
    });
});
