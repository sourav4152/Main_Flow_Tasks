<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modern Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <button class="theme-toggle" id="themeToggle">🌙</button>

    <div class="form-wrapper">
        <form   action="login.php" method="POST" class="login-container ">
            <h2>Login</h2>
            <div class="switch-to-signUp">
                <h2 id="Tabheading">Sign<br>up</h2>
            </div>

            <label for="userid">User ID</label>
            <input type="text" id="userid" name="identifier" placeholder="Enter your user ID or email">
            <div class="error" id="loginUserIdError"></div>

            <label for="password">Password</label>
            <div id="forPasswordToggel">
                 <input type="password" id="password" name="password" placeholder="Enter your password">
                <div class="toggle-password" onclick="togglePassword()">👁</div>
            </div>
            <div class="error" id="loginuserPasswordError"></div>
            <div class="forget-password">
                <a href="#">forget password</a>
            </div>

             <button type="submit">Login</button>
        </form>

        <!-- 📝 Signup Form -->
        <div class="signup-container">

            <h2>Sign Up Now</h2>
            <div class="switch-to-login">
                <h2>login</h2>
            </div>

            <form action="signup.php" method="POST">

                <div class="signUp-box">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your Full Name">
                    <div class="error" id="userNameError"></div>
                </div>

                <div class="signUp-box">
                    <label for="create-userid">User ID:</label>
                    <input type="text" id="create-userid" name="userid" placeholder="Enter unique user ID">
                    <div class="error" id="userIdError"></div>
                </div>

                <div class="signUp-box">
                    <label for="gmail">Email Id:</label>
                    <input type="email" id="gmail" name="email" placeholder="Enter your mail">
                    <div class="error" id="userMailError"></div>
                </div>

                <div class="signUp-box">
                    <label for="create-password">Password:</label>
                    <input type="password" id="create-password" name="password" placeholder="Enter Password">
                </div>

                <div class="signUp-box">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                    <div class="error" id="userpasswordError"></div>
                </div>

                <button type="submit">Sign UP</button>

            </form>

        </div>


    </div>


    <script src="script.js"></script>
</body>

</html>