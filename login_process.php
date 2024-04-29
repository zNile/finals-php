<?php
session_start();

$user_email = $_POST['user_email'];
$user_password= $_POST['user_password'];

$connection = new mysqli('localhost', 'root', '', 'bsit2a');

if ($connection->connect_error) {
    die('Connection Failed!: '. $connection->connect_error);
}

// Select the database
if (!$connection->select_db('bsit2a')) {
    die('Database selection failed: '.$connection->error);
}

$statement = $connection->prepare("SELECT * FROM user WHERE user_email = ? AND user_password = ?");
$statement->bind_param("ss", $user_email, $user_password);
echo "Email entered: ".$user_email."<br>";
echo "Password entered: ".$user_password."<br>";
if (!$statement->execute()) {
    die('Error executing query: '. $statement->error);
}
$statement->execute();
$result = $statement->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc(); 
    echo 'You have logged in successfully!'."<BR>";
    header('Location: dashboard.php');

    exit();
} else {
    echo "Invalid password";
    
} 


$statement->close();
$connection->close();
?>



