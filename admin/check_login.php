<?php
session_start();
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo "Email: $email<br>";
        echo "Password: $password<br>";

        $db = Database::connect();
        $statement = $db->prepare('SELECT * FROM users WHERE email = ?');
        $statement->execute(array($email));
        $user = $statement->fetch();

        if (!$user) {
            echo "No user found with email: $email";
            exit();
        }

        if ($password === $user['password']) {
            $_SESSION['user'] = $user['email'];
            header("Location: index.php");
        } else {
            echo "Password is incorrect.";
            exit();
        }

        Database::disconnect();
    } else {
        echo "Email or password not set in POST request.";
        exit();
    }
} else {
    header("Location: login.php");
}
?>

