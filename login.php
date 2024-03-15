<?php
require 'db.php';
require 'functions.php';

// Pārbaudam, vai lietotājs ir jau pierakstījies
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Pārbaudam, vai forma ir nosūtīta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password, $db)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}

include 'header.php';
include 'login_form.php';
include 'footer.php';
?>
