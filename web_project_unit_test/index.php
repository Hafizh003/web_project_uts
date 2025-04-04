<?php

session_start();

$error = [
    'login' => $_SESSION['login_error'] ??'',
    'register' => $_SESSION['register_error'] ??''
];

$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';

}
function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Web Project</title>
    <link rel="stylesheet" href="style.css">
</head>
    
<body>
    <div class="container"> <!-- Perbaikan: Bungkus semua form di dalam container -->
        <div class="form_box <?= isActiveForm('login', $activeForm); ?>" id="login_form"> 
            <form action="login_register.php" method="POST">
                <h2>Sign in</h2>
                <?= showError($error['login']); ?>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>Do not have an account? <a href="#" onclick="showForm('register_form')">Register</a></p>
            </form>
        </div>

        <div class="form_box <?= isActiveForm('register', $activeForm); ?>" id="register_form"> 
            <form action="login_register.php" method="POST">
                <h2>Sign up</h2>
                <?= showError($error['register']); ?>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="">Select role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login_form')">Login</a></p>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
