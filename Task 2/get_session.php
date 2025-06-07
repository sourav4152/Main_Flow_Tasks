<?php
session_start();
$response = [];

if (isset($_SESSION['errors'])) {
    $response['errors'] = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

if (isset($_SESSION['old'])) {
    $response['old'] = $_SESSION['old'];
    unset($_SESSION['old']);
}

if (isset($_SESSION['success'])) {
    $response['success'] = $_SESSION['success'];
    unset($_SESSION['success']);
}

if (isset($_SESSION['tab'])) {
    $response['tab'] = $_SESSION['tab'];
    unset($_SESSION['tab']);
}

header('Content-Type: application/json');
echo json_encode($response);
?>
