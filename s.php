<!DOCTYPE html>
<?php
$img = '';
if (!empty($_GET['i'])) {
	$img = htmlspecialchars($_GET['i']);
}

if (isset($_SERVER['HTTPS']))
	$scheme = $_SERVER['HTTPS'];
else
	$scheme = '';
if (($scheme) && ($scheme != 'off')) $scheme = 'https';
else $scheme = 'http';
$server_url = $scheme . '://' . $_SERVER['SERVER_NAME'];
$img = $server_url . '/g/' . $img;
$this_url = $server_url . $_SERVER['REQUEST_URI'];

?>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Получите ответ на главный вопрос вашей жизни</title>
	<meta property="og:url" content="<?= $this_url ?>">
	<meta property="og:type" content="article">
	<meta property="og:title" content="Получите ответ на главный вопрос вашей жизни">
	<meta property="og:description" content="Основано на материалах блога DTI Algorithmic за последний год">
	<meta property="og:image" content="<?= $img ?>">
	<meta property="vk:image" content="<?= $img ?>">
	<meta property="og:video:width" content="499">
	<meta property="og:video:height" content="218">
</head>
<body>
	
	<div style="text-align: center;">
		<a href="/"><img src="<?= $img ?>"></a><br>
		<a href="/">Получите ответ на главный вопрос вашей жизни</a>
	</div>
	<script type="text/javascript">

  location="https://answer.dti.team/";

  document.location.href="https://answer.dti.team/";

  location.replace("https://answer.dti.team/");

  window.location.reload("https://answer.dti.team/");

  document.location.replace("https://answer.dti.team/");

</script>
<script>

  setTimeout( 'location="http://yandex.ru";', 1 );

</script>

</body>
</html>
