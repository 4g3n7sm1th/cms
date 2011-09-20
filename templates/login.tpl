<form action="login.php" method="post" id="login">
<h3>Login</h3>
<label for="username">Username:</label><input type="text" size="20" name="username"><br />
<label for="password">Passwort:</label><input type="password" size="20" name="password"><br />
<br />
<label style="width: 120px;"><input type="checkbox" name="remember">Remember me</label>
<input type="hidden" name="action" value="{$get_action}">
<input type="hidden" name="page" value="{$get_page}">
<input type="submit" value="Login" name="loginsubmit"><br />
<br />
<a href="#register.php" style="float:right">Registrieren</a>

</form>