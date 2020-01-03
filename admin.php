<?php
  session_start();
  require_once 'connection.php';
  if (isset($_POST['del_user']) or isset($_POST['add_q'])) {
  	$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
  	if (isset($_POST['add_q']) && $_POST['add_q']!='') {
  		$add_q=htmlentities(mysqli_real_escape_string($link,$_POST['add_q']));
  		$query="INSERT INTO questions VALUES(NULL,'1','$add_q')";
  	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

  	}
  	if(isset($_POST['del_user']) && $_POST['del_user']!=''){
 
	$link = mysqli_connect($host, $user, $password, $database) 
            or die("Ошибка " . mysqli_error($link)); 
    $del_user = mysqli_real_escape_string($link, $_POST['del_user']);
     
    $query ="DELETE FROM users WHERE login = '$del_user'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
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
	<div class="us admin">
	<div >
		<h1>Выберите действие</h1>
		<form class="opinion" method="POST" name="feedback">
		<div class="group">
			<label>Удалить пользователя:</label>
			<input type="text" placeholder="Имя" id="del_user" name="del_user">
		</div>
		<div class="group">
		<label>Добавить вопрос:</label>
		<input type="text" placeholder="вопрос" id="add_q" name="add_q">
		</div>
		<div class="group">
		<input type="submit" name="done" id="done" value="Отправить">
		</div>
		</form>
	</div>
	</div>
	<div class="footer">

	<h3>©2011-2019 NERIS Analytics Limited</h3>
	<p>Disclaimer: All non-English versions of the website contain unofficial translations contributed by our users. They are not binding in any way, are not guaranteed to be accurate, and have no legal effect. The official text is the English version of the website. Please consider reporting inaccuracies to support@16personalities.com or join our translation project!</p>
	<div class="social-networks">
		<a href="https://sun1-84.userapi.com/c205124/v205124810/ecfc/KILdVU9gQng.jpg"><img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/vk-256.png"></a>
		<a href="https://sun1-84.userapi.com/c205124/v205124810/ecfc/KILdVU9gQng.jpg" target="_blank"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_circle_color-512.png"></a>
		<a href="https://sun1-84.userapi.com/c205124/v205124810/ecfc/KILdVU9gQng.jpg"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_circle_color-256.png"></a>	
		<a href="https://sun9-36.userapi.com/c857416/v857416091/10eec0/jbP01fnOD_I.jpg"><img src="https://cdn2.iconfinder.com/data/icons/social-icons-33/128/Instagram-256.png"></a>
	</div>
</body>
</html>