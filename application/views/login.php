<!DOCTYPE html>
<html>
  <head>
    <title>Login Admin Ijazah</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }

      h1 {
        text-align: center;
        margin-top: 70px;
      }

      .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-top: 70px;
      }

      .form-group {
        margin-bottom: 15px;
      }

      label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
      }

      input[type="text"],
      input[type="password"] {
        width: 95%;
        padding: 10px;
        border-radius: 3px;
        border: 1px solid #ccc;
        outline: none;
      }

      button {
        display: block;
        width: 100%;
        padding: 10px;
        border-radius: 3px;
        border: none;
        background-color: #4caf50;
        color: #ffffff;
        font-size: 16px;
        cursor: pointer;
      }

      button:hover {
        background-color: #45a049;
      }

      .error-message {
        color: #ff0000;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <h1 class="Label" >Login Admin Ijazah</h1>
    <div class="container">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required />
        </div>
        <div class="form-group">
          <button type="submit">Login</button>
        </div>
      </form>

      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validasi username dan password
        if ($username === 'admin' && $password === 'admin') {
          header ('location: nav.php');
          
        } else {
          echo '<div class="error-message">Username atau password salah!</div>';
        }
      }
      ?>
    </div>
  </body>
</html>
