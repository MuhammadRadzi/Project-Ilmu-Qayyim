<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Tahoma, sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #74b9ff, #0984e3);
    }

    .login-container {
      background: #fff;
      padding: 30px 25px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 350px;
      text-align: center;
      animation: fadeIn 0.6s ease-in-out;
    }

    .login-container h1 {
      margin-bottom: 20px;
      color: #2d3436;
      font-size: 24px;
    }

    .error-msg {
      background: #ffe3e3;
      color: #d63031;
      padding: 10px;
      border-radius: 8px;
      font-size: 14px;
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      text-align: left;
      font-size: 14px;
      color: #636e72;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 18px;
      border: 1px solid #dcdde1;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #0984e3;
      outline: none;
      box-shadow: 0 0 6px rgba(9,132,227,0.3);
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background: #0984e3;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      cursor: pointer;
      font-weight: 600;
      transition: 0.3s;
    }

    input[type="submit"]:hover {
      background: #74b9ff;
    }

    .extra-links {
      margin-top: 15px;
      font-size: 13px;
    }

    .extra-links a {
      color: #0984e3;
      text-decoration: none;
    }

    .extra-links a:hover {
      text-decoration: underline;
    }

    /* Animasi */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>

    <?php if (isset($_GET['error'])): ?>
      <div class="error-msg">⚠️ Username atau password salah!</div>
    <?php endif; ?>

    <form action="auth.php" method="post">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Login">
    </form>

    <div class="extra-links">
      <p>Belum punya akun? <a href="#">Daftar</a></p>
      <p><a href="#">Lupa Password?</a></p>
    </div>
  </div>
</body>
</html>
