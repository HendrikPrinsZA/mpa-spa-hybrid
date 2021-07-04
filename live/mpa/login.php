<?php

// Default the username 
$username = trim($_POST["username"] ?? "johndoe@company.com");
 
// Dummy login logic
if (!empty($_POST['username'])) {
  session_start();
  $_SESSION["loggedin"] = true;
  $_SESSION["username"] = $username;
  header("location: dashboard.php");
  exit;
}

// Dummy logout logic
if (isset($_GET['logout'])) {
  session_start();

  // Usually we will just destroy the session, but not when running the webpack devServer
  // - We want to retain the $_SESSION['SPA_HOST']
  $SPA_HOST = $_SESSION['SPA_HOST'] ?? null;

  // Destroy the session
  session_destroy();

  if ($SPA_HOST !== null) {
    session_start();
    $_SESSION["SPA_HOST"] = $SPA_HOST;
  }

  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="css/login.css">
  <title>Login</title>
</head>
<body>
  <div class="login-container">
    <section class="login" id="login">
      <header>
        <h2>MPA SPA Hybrid</h2>
        <h4>Sample application</h4>
      </header>
      <form class="login-form" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input name="username" type="text" class="login-input" placeholder="User" required autofocus value="<?= $username; ?>"/>
        <input name="password" type="password" class="login-input" placeholder="Password" required value="randompassword"/>
        <div class="submit-container">
          <button type="submit" class="login-button">SIGN IN</button>
        </div>
      </form>
    </section>
  </div>
</body>
</html>
