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
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashed_password]);
        $success = "User registered successfully. Please log in.";
    } catch (PDOException $e) {
        $error = "Error registering user: " . $e->getMessage();
    }
}

include 'header.php';
include 'register_form.php';
include 'footer.php';
?>
