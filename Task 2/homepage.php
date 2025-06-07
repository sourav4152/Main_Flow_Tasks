<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Welcome</title>
  <link rel="stylesheet" href="homepage.css" />
</head>
<body>
  <div class="box">
    <h1>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h1>
    <p>You have successfully logged in 🎉</p>
    <form action="logout.php" method="POST">
      <button type="submit">Logout</button>
    </form>
  </div>
</body>
</html>
