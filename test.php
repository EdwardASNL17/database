<?php
		session_start();
		require_once 'connection.php';
		$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
        $query="SELECT name, comment, question_name FROM test JOIN questions ON questions.test_id=test.id WHERE questions.test_id=1";
       	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
       	$rows=mysqli_num_rows($result);
       	for($i=0;$i<$rows;$i++)
       	{	
       	  $row = mysqli_fetch_row($result);
       	  for($j=0;$j<3;$j++)
       	  {
       	  	if ($j==0) {
       	  		$test_name=$row[$j];
       	  	}
       	  	if ($j==1) {
       	  		$test_op=$row[$j];
       	  	}
       	  	if ($j==2) {
       	  		$questions[$i]=$row[$j];
       	  	}
       	  	
       	  }

       	}
       	
        mysqli_close($link);


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
 		<?php if (!isset($_SESSION['login'])) { ?><a href="/signin.php">Войти</a><?php } ?>
 		<?php if (isset($_SESSION['login'])) { ?><a href="/signin.php">Личный кабинет</a><?php } ?>
	</div>
	<div class="shpk-test">
		<div class="text-content">
			<h1 ><?php echo $test_name;  ?></h1>
			<h3><?php echo $test_op;  ?></h3>
			<div class="shpk-container">
				<div class="test-box" >
					<img src="https://static.neris-assets.com/images/test-header-1.svg">
					<p>Тест занимает менее 12 минут.</p>
				</div>
				<div class="test-box" >
					<img src="https://static.neris-assets.com/images/test-header-2.svg">
					<p>Отвечайте честно (даже если вам не нравится ответ).</p>
				</div>
				<div class="test-box" >
					<img src="https://static.neris-assets.com/images/test-header-3.svg">
					<p>Постарайтесь не давать “нейтральных” ответов.</p>
				</div>
			</div>
		</div>
	</div>
	<?php if(isset($_SESSION['login'])) {  ?><div class="test-quest">
		<?php for($i=0;$i<$rows;$i++) { ?>
			<form>
			<h3><?php echo $questions[$i];  ?></h1>
			<div class="quest-var">
				<div><p>Да</p></div>
				<div><p>З/О</p></div>
				<div><p>Нет</p></div>
			</div>
		</form><?php  } ?>
		
		<?php  } else echo "Вы не авторизовались"; ?>
	</div>

</body>
</html>