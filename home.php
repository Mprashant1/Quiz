<?php
 include 'header1.php';
?>
        <div class="container">
            <div class="info">
                <h2>Please Login/Register to give exam</h2>
            </div>
            <div class="login">
                <form action="login.php" class="form1" method="post">
                    <h4 class="center">Login</h4>
                    <label for="question">Username     <input type="text" name="username" class="test"></label>
                    <label for="question">Password&nbsp     <input type="text" name="password" class="test"></label>
                    <input type="submit" value="Login" name="login" class="btn">
                </form>
            </div>
            <div class="register">
                <form action="register.php" class="form2" method="post">
                    <h4 class="center">Register</h4>
                    <label for="question">Username     <input type="text" name="username" class="test"></label>
                    <label for="question">Password&nbsp      <input type="text" name="password" class="test"></label>
                    <label for="question">E-mail&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="email" class="test"></label>
                    <input type="submit" value="Register" name="register" class="btn">
                </form>
            </div>
        </div>
</body>
</html>