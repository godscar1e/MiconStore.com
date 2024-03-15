$(document).ready(function () {
    $("#registrationForm").submit(async function (event) {
        // Prevent the default form submission
        let errorMessage = document.getElementById('errorEmailMessage');
        event.preventDefault();

        // Disable the submit button to prevent double submission
        $("#submitBtn").prop("disabled", true);

        // Show loading spinner during the AJAX request
        $(".loading-spinner").show();

        // Validate the form
        isEmailValid = validateEmail();
        isPasswordValid = validatePassword();
        isPhoneValid = await validatePhone(); // Use await for asynchronous validation

        console.log("Form validation results:", isEmailValid, isPasswordValid, isPhoneValid);

        // Check if all validations pass before making the AJAX request
        if (isEmailValid && isPasswordValid && isPhoneValid) {
            // Make the AJAX request
            $.ajax({
                type: "POST",
                url: "register.php",
                data: $("#registrationForm").serialize(),
                dataType: "json",
                success: function (response) {
                    // Inside your AJAX success block
                    if (response.status === 'error') {
                        errorMessage.style.display = 'block';
                        errorMessage.textContent = response.message || 'An error occurred. Please try again later.'; // Display the error message
                    } else {
                        // Registration successful
                        console.log("Registration successful!");

                        // Show the success modal after 2 seconds
                        showSuccessModal();

                        // Redirect to index.php after 2 seconds
                        setTimeout(function () {
                            window.location.href = 'http://localhost:3000/index.php';
                        }, 1500);
                    }
                },
                error: function (error) {
                    // Handle AJAX error
                    console.error("AJAX error:", error);
                },
                complete: function () {
                    // Enable the submit button and hide the loading spinner after the request completes
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
