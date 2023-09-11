<?php include 'login.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="registration.css">
</head>

<body>
  <div class="container">
    <img src="https://www.megaparts.bg/images/megaparts-logo-dark-large.svg" alt="Logo">
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <p class="error">
        <?php echo $error; ?>
      </p>
      <input type="submit" value="Login">
    </form>
    <p>
      Нямате профил?
      <a href="registration.php">Регистрация</a>
    </p>
  </div>
</body>

</html>