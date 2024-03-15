<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/imask"></script>
    <title>Document</title>
</head>

<body>
    <form class="rightsideblock__profile-form" id="profileForm" action="post">
        <div class="form-group">
            <label for="name">Name</label>
            <div class="input-wrapper">
                <input type="text" id="name" placeholder="Enter a new name and confirm changes" name="name" <input
                    type="text" id="name" placeholder="Name" name="name" oninput="toggleButtonVisibility('name')"
                    onkeypress="return /[a-zA-Z ]/.test(event.key)" required>

                <button class="input-button" id="confirmButton_name">Confirm</button>
                <div class="icon"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <div class="input-wrapper">
                <input type="text" id="phone" placeholder="Phone" name="phone" oninput="toggleButtonVisibility('phone')"
                    required>

                <button class=" input-button" id="confirmButton_phone">Confirm</button>
                <div class="icon"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-wrapper">
                <input type="text" id="email" placeholder="Email" name="email" oninput="toggleButtonVisibility('email')"
                    onkeypress="return /[a-zA-Z0-9!@#$%^&*()_+{}\[\]:;<>,.?~\\/\-]/.test(event.key)" required>


                <button class="input-button" id="confirmButton_email">Confirm</button>
                <div class="icon"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <div class="input-wrapper">
                <input type="text" id="city" placeholder="City" name="city" oninput="toggleButtonVisibility('city')"
                    onkeypress="return /[a-zA-Z]/.test(event.key)">
                <button class="input-button" id="confirmButton_city">Confirm</button>
                <div class="icon"></div>
            </div>
        </div>
    </form>



</body>

</html>