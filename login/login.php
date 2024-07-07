
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WEB BEKS</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Вход</div>
      <div class="title signup">Регистрация</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Вход</label>
        <label for="signup" class="slide signup">Регистрация</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form action="loginin.php" class="login" method="post">
          <div class="field">
            <input type="text" name="email" placeholder="Email" size="50" required>
          </div>
          <div class="field">
            <input type="password" name="password" placeholder="Пароль" required>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Войти">
          </div>
          <div class="signup-link">Впервые здесь? <a href="#">Зарегистрируйся</a></div>
        </form>
        <form action="register.php" method="POST" class="signup">
          <div class="field">
            <input type="email" name="email" placeholder="Email" required>
          </div>
          <div class="field">
            <input type="password" name="password" placeholder="Пароль" required>
          </div>
          <div class="field">
            <input type="password" name="confirm_password" placeholder="Повторите пароль" required>
            <p id="passwordError" style="color: red; display: none;">Пароли не совпадают</p>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Зарегистрироваться">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
  <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            var passwordError = document.getElementById("passwordError");

            if (password !== confirm_password) {
                passwordError.style.display = "block";
                return false;
            } else {
                passwordError.style.display = "none";
                return true;
            }
        }
    </script>
    </script>
</body>
</html>