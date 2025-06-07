<?php
session_start();
include 'connect.php';

$name = $_POST['name'];
$userid = $_POST['userid'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$_SESSION['old'] = $_POST;
$errors = [];

// Validation
if (empty($name)) $errors['userNameError'] = "Name is required.";
if (empty($userid)) {
    $errors['userIdError'] = "User ID is required.";
} elseif (!preg_match('/^[a-zA-Z0-9]{4,}$/', $userid)) {
    $errors['userIdError'] = "User ID must be at least 4 characters and alphanumeric.";
}
if (empty($email)) {
    $errors['userMailError'] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['userMailError'] = "Invalid email format.";
}
if (empty($password) || empty($confirmPassword)) {
    $errors['userpasswordError'] = "Password fields are required.";
} elseif ($password !== $confirmPassword) {
    $errors['userpasswordError'] = "Passwords do not match.";
}

// Check if userid already exists
$checkUser = $conn->prepare("SELECT * FROM users WHERE userid = ?");
$checkUser->bind_param("s", $userid);
$checkUser->execute();
if ($checkUser->get_result()->num_rows > 0) {
    $errors['userIdError'] = "User ID already taken.";
}

// Check if email already exists
$checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
$checkEmail->bind_param("s", $email);
$checkEmail->execute();
if ($checkEmail->get_result()->num_rows > 0) {
    $errors['userMailError'] = "Email already registered.";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['tab'] = 'signup'; // ❗ stay on signup
    header("Location: index.php");
    exit();
}

// All good — insert user
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$insertUser = $conn->prepare("INSERT INTO users (name, userid, email, password) VALUES (?, ?, ?, ?)");
$insertUser->bind_param("ssss", $name, $userid, $email, $hashedPassword);

if ($insertUser->execute()) {
    $_SESSION['success'] = "Signup successful!";
    $_SESSION['tab'] = 'login'; // ✅ switch to login
} else {
    $_SESSION['errors']['signupError'] = "Something went wrong.";
    $_SESSION['tab'] = 'signup';
}
header("Location: index.php");
$conn->close();
exit();
?>
