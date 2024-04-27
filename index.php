<?php

function showValue($name) {
    if(!empty($_SESSION[$name])){
        echo $_SESSION[$name];
    }

}
$_SESSION = $_POST

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Personal Information</h2>
        <form action="details.php" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value=<?php showValue('first_name') ?>>
                <?php
                    if(isset($_SESSION['first_name']) && empty($_SESSION['first_name'])) {
                ?>
                    <span>This field is required.</span>
                <?php
                }
                ?>
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name"><br>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value=<?php showValue('last_name') ?>><br>
                <?php
                    if(isset($_SESSION['last_name']) && empty($_SESSION['last_name'])) {
                ?>
                    <span>This field is required.</span>
                <?php
                }
                ?>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" min="1"><br>
                <?php
                    if(isset($_SESSION['age']) && empty($_SESSION['age'])) {
                ?>
                    <span>This field is required.</span>
                <?php
                }
                ?>
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday"><br>
            <button type="submit">Next</button>
        </form>
    </div>
</body>
</html>