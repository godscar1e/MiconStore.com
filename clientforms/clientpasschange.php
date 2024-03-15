<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexusIT</title>
</head>

<body>
    <form class="rightsideblock__changepass-form" id="changepassForm" action="post">
        <div class="form-group">
            <label for="">New Password</label>
            <div class="input-wrapper">
                <input type="text" placeholder="New Password" name="newPassword"
                    oninput="toggleButtonVisibility('newPassword')">
                <button class="input-button" id="confirmButton_newpass">Confirm</button>
                <div class="icon"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Repeat Password</label>
            <div class="input-wrapper">
                <input type="password" placeholder="Repeat Password" name="repeatPassword"
                    oninput="toggleButtonVisibility('repeatPassword')">
                <button class="input-button" id="confirmButton_reppass">Confirm</button>
                <div class="icon"></div>
            </div>
        </div>
    </form>

</body>

</html>