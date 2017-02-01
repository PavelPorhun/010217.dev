<?php
session_start();

if($_SESSION['admin']){
	header("Location: index.php");
	exit;
}

$admin = 'admin';
$pass = '123';

if($_POST['submit']){
	if($admin == $_POST['user'] AND $pass == md5($_POST['pass'])){
		$_SESSION['admin'] = $admin;
		header("Location: index.php");
		exit;
	}else echo '<p>Логин или пароль неверны!</p>';
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <p>
            <a href="index.php">Главная</a>
        </p>
<hr />
        <br />
        <form method="post" action="auth.php">
	        Username: <input type="text" name="user" /><br />
	        Password: <input type="password" name="pass" /><br />
	        <input type="submit" name="submit" value="Войти" />
        </form>
        <a href="admin.php?do=logout">Выход</a>
    </body>
</html>
