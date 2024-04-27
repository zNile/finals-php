<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Your Information</h2>
        <?php
        function sanitizeInput($input) {
            return htmlspecialchars(trim($input));
        }

        if (isset($_POST["first_name"], $_POST["middle_name"], $_POST["last_name"], $_POST["age"], $_POST["birthday"], $_POST["address"], $_POST["email"], $_POST["facebook"], $_POST["phone"])) {
            $first_name = sanitizeInput($_POST["first_name"]);
            $middle_name = isset($_POST["middle_name"]) ? sanitizeInput($_POST["middle_name"]) : "";
            $last_name = sanitizeInput($_POST["last_name"]);
            $age = filter_var($_POST["age"], FILTER_VALIDATE_INT);
            $birthday = sanitizeInput($_POST["birthday"]);
            $address = sanitizeInput($_POST["address"]);
            $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
            $facebook = filter_var($_POST["facebook"], FILTER_VALIDATE_URL);
            $phone = sanitizeInput($_POST["phone"]);

            if ($age === false || $email === false || $facebook === false) {
                echo "<p>Some inputs are invalid!</p>";
            } else {
                echo "<p>Name: $first_name";
                if (!empty($middle_name)) {
                    echo " $middle_name";
                }
                echo " $last_name</p>";
                echo "<p>Age: $age</p>";
                echo "<p>Birthday: $birthday</p>";
                echo "<p>Address: $address</p>";
                echo "<p>Email: $email</p>";
                echo "<p>Facebook: $facebook</p>";
                echo "<p>Phone: $phone</p>";
            }
        } else {
            echo "<p>Form not submitted!</p>";
        }
        ?>
    </div>
    <a href ="index.php"> GO BACK </a>
</body>
</html>
