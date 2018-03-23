<?php
session_start();
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
}
?>
<h1>Login</h1>
<label>Username</label><br/>
<input type="text" name="username"><br/>
<label>Password</label><br/>
<input type="text" name="password"><br/>
<input type="submit" value="Login"><br/>
<br/>

<a href="forgotten_password.php">Forgotten Password</a>
