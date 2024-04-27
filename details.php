<?php
session_start();

$_SESSION['first_name'] = htmlspecialchars($_POST['first_name']);
$_SESSION['last_name'] = htmlspecialchars($_POST['last_name']);

if(filter_var($_POST['age'], FILTER_VALIDATE_INT)){
    $_SESSION['age'] = $_POST['age'];
} else {
    $_SESSION['age'] = 0;
}

if(!empty($_SESSION['first_name']) && !empty($_SESSION['last_name']) && !empty($_SESSION['age']) && !empty($_SESSION['birthday'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Additional Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Additional Information</h2>
        <form action="display.php" method="post">
            <?php
            if (isset($_POST["first_name"], $_POST["middle_name"], $_POST["last_name"], $_POST["age"], $_POST["birthday"])) {
                $first_name = htmlspecialchars($_POST["first_name"]);
                $middle_name = isset($_POST["middle_name"]) ? htmlspecialchars($_POST["middle_name"]) : "";
                $last_name = htmlspecialchars($_POST["last_name"]);
                $age = htmlspecialchars($_POST["age"]);
                $birthday = htmlspecialchars($_POST["birthday"]);

                echo "<p>First Name: $first_name</p>";
                if (!empty($middle_name)) {
                    echo "<p>Middle Name: $middle_name</p>";
                }
                echo "<p>Last Name: $last_name</p>";
                echo "<p>Age: $age</p>";
                echo "<p>Birthday: $birthday</p>";

                echo "<input type='hidden' name='first_name' value='$first_name'>";
                echo "<input type='hidden' name='middle_name' value='$middle_name'>";
                echo "<input type='hidden' name='last_name' value='$last_name'>";
                echo "<input type='hidden' name='age' value='$age'>";
                echo "<input type='hidden' name='birthday' value='$birthday'>";
            } else {
                echo "<p>No data submitted!</p>";
            }
            ?>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="facebook">Facebook Link:</label>
            <input type="url" id="facebook" name="facebook" required><br>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required><br>
            <button type="submit">Confirm</button>
        </form>
    </div>
</body>
</html>
<?php
} else {
    include_once 'index.php';
}
?>
