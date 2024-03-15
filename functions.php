<?php
// Izmantojam sesiju tikai tad, ja vēl nav aktīva
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function getBooks($db) {
    $stmt = $db->query("SELECT * FROM books");
    return $stmt->fetchAll();
}

function login($username, $password, $db) {
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;
    }
    return false;
}
?>
