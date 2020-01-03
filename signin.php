<?php
	  session_start();
	  require_once 'connection.php';
	  if(isset($_POST["login"]) && isset($_POST["password"]))
	 	{
    		 $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 

        	$login=htmlentities(mysqli_real_escape_string($link, $_POST['login']));
			$hash_pass=md5($_POST['password']);
			$password=htmlentities(mysqli_real_escape_string($link, $hash_pass));
			$query="SELECT * from users WHERE login='$login' and password='$password'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
			$count=mysqli_num_rows($result);
			if ($count==1) {
				$_SESSION['login']=$login;
				# code...
			}
			else {
				echo "ERROR";
				# code...
			}

			

			mysqli_close($link);
    	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>fdsfdsf</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 	<div class="header">
 		<a href="/index.php">Главная</a>
 		<a href="">Типы Личности</a>
 		<a href="">Результаты</a>
 		<a href="/feedback.php">Связаться</a>
 		<?php if(isset($_SESSION['login'])) { ?><a href="/signin.php">Личный кабинет</a><?php } else { ?> <a href="/signin.php">Войти</a><?php }  ?>
	</div>
	<div class="log">
		<div class="log-content">
			<?php if(isset($_SESSION['login'])) { ?><h1>Добро пожаловать</h1><?php }  ?>
			<?php if(!isset($_SESSION['login'])) { ?><h1>Войти</h1><?php }  ?>
			<?php if(!isset($_SESSION['login'])) { ?><h2>или <a href="/signup.php">зарегистрироваться</a></h2><?php }  ?>
			<?php if(isset($_SESSION['login'])) { ?><h2><?php echo $_SESSION['login'];?></h2><?php }  ?>
			<?php if(isset($_SESSION['cash'])) { ?><h2><?php echo $_SESSION['cash'];?></h2><?php }  ?>
			
			<?php if(isset($_SESSION['login'])) { ?><h2 class="logout"><a href="logout.php">Выйти</a></h2><?php }  ?>
			<?php if(isset($_SESSION['login']) && $_SESSION['login'] == 'EdwardASNL17') { ?><h2 class="logout"><a href="admin.php">Внести изменения</a></h2><?php }  ?>

			
		</div>

	</div>
	<?php if(!isset($_SESSION['login'])) { ?><div class="logbox">
		<form class="log-form" method="POST" name="signin">
			<label>Введите логин:</label>
			<input type="text"  id="login" name="login">
			<label>Введите пароль:</label>
			<input type="password"  id="password" name="password">
			<input type="submit" name="done" id="done" value="Войти">
		</form>
	</div><?php } ?>
	<div class="footer">

	<h3>©2011-2019 NERIS Analytics Limited</h3>
	<p>Disclaimer: All non-English versions of the website contain unofficial translations contributed by our users. They are not binding in any way, are not guaranteed to be accurate, and have no legal effect. The official text is the English version of the website. Please consider reporting inaccuracies to support@16personalities.com or join our translation project!</p>
	<div class="social-networks">
		<a href="https://sun1-84.userapi.com/c205124/v205124810/ecfc/KILdVU9gQng.jpg"><img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/vk-256.png"></a>
		<a href="https://sun1-84.userapi.com/c205124/v205124810/ecfc/KILdVU9gQng.jpg" target="_blank"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_circle_color-512.png"></a>
		<a href="https://sun1-84.userapi.com/c205124/v205124810/ecfc/KILdVU9gQng.jpg"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_circle_color-256.png"></a>	
		<a href="https://sun9-36.userapi.com/c857416/v857416091/10eec0/jbP01fnOD_I.jpg"><img src="https://cdn2.iconfinder.com/data/icons/social-icons-33/128/Instagram-256.png"></a>
	</div>
</div>

</body>
</html>
