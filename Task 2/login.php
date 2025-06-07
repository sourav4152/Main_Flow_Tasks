<?php
session_start(); // ✅ Required for sessions
include 'connect.php';

// Get login data
$identifier = $_POST['identifier'] ?? '';
$password = $_POST['password'] ?? '';

$errors = [];

// Validate inputs
if (empty($identifier)) {
    $errors['loginUserIdError'] = "Please enter your User ID or Email.";
}
if (empty($password)) {
    $errors['loginuserPasswordError'] = "Please enter your password.";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("Location: index.php");
    exit();
}

// Check for user
$stmt = $conn->prepare("SELECT * FROM users WHERE userid = ? OR email = ?");
$stmt->bind_param("ss", $identifier, $identifier);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['name']; // ✅ Save name for homepage
        header("Location: homepage.php");  // ✅ Redirect to homepage
        exit();
    } else {
        $errors['loginuserPasswordError'] = "❌ Incorrect password.";
    }
} else {
    $errors['loginUserIdError'] = "❌ No account found with that User ID or Email.";
}

$_SESSION['errors'] = $errors;
$_SESSION['old'] = $_POST;
header("Location: index.php");
exit();
