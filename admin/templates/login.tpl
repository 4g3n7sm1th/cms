{include file="headinclude.tpl"}
<table style="width:100%;height:100%;font-size:1em;padding:0;margin:0;border:0;"><tr>
<td style="background-color:#eee;text-align:center;vertical-align:middle;padding:0;margin:0;border:0">

<div class="message-message login">
<form action="login.php" method="post" id="login">
<h3>Login</h3>
<label for="username">Username:</label><input type="text" size="20" name="username"><br />
<label for="password">Passwort:</label><input type="password" size="20" name="password"><br />
<br />
<label style="width: 120px;"><input type="checkbox" name="remember">Remember me</label><br /><br />
<input type="submit" value="Login" name="loginsubmit" style="float:left">
<input type="hidden" name="action" value="{$get_action}">
<input type="hidden" name="page" value="{$get_page}">
</form>
</div>
</td>
</tr></table>
</body>
</html>