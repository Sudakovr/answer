<?php

$text = 'Получите ответ на главный вопрос вашей жизни';
$description = 'Основано на материалах блога DTI Algorithmic за последний год';
$texttwitter = 'Получите ответ на главный вопрос вашей жизни, основано на материалах блога DTI Algorithmic за последний год';
$textvk = 'Получите ответ на главный вопрос вашей жизни, основано на материалах блога DTI Algorithmic за последний год';
$link = 'Получите ответ на главный вопрос вашей жизни answer.dti.team';

if (isset($_SERVER['HTTPS']))
	$scheme = $_SERVER['HTTPS'];
else
	$scheme = '';
if (($scheme) && ($scheme != 'off')) $scheme = 'https';
else $scheme = 'http';
$server_url = $scheme . '://' . $_SERVER['SERVER_NAME'];
$og = '';
$img_dir = '';

if (!empty($_GET['go'])) {
	$go = htmlspecialchars($_GET['go']);
	$img_name = '';

	if (!empty($_GET['q']) or !empty($_GET['a'])) {
		$og = 's.php?i=';
		$img_dir = 'g/';
		$q = htmlspecialchars($_GET['q']);
		$a = htmlspecialchars($_GET['a']);
		$img_name =  bin2hex(random_bytes(16)) . '.png';
		$create_img_url = $server_url . '/' . 'image.php?n=' . $img_dir . $img_name . '&a=' . rawurlencode($a) . '&q=' . rawurlencode($q);

		if( $curl = curl_init() ) {
			echo 'CURL';
			curl_setopt($curl, CURLOPT_URL, $create_img_url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$out = curl_exec($curl);
			curl_close($curl);
		}
	}
	switch ($go) {
		case 'vk':
		$url = 'https://vk.com';
		$url .= '/share.php?url=' . $server_url . '/' . $og . $img_name . '&title=' . $text . '&description=' . $description . '&image=' . $server_url . '/' . $img_dir . $img_name . '&noparse=true';
		break;
		case 'twitter':
		$url = 'https://twitter.com';
		$url .= '/intent/tweet?url=' . $server_url .'/' . $og . $img_name . '&text=' . $text;
		break;
		case 'facebook':
		$url = 'https://facebook.com';
		$url .= '/sharer/sharer.php?u=' . $server_url . '/' . $og . $img_name . '&text=' . $link;
		break;
		case 'telegram':
		$url = 'https://t-do.ru/';
		$url .= '/share/url?url=' . $server_url . '/' . $img_dir . $img_name . '&text=' . $link;
		break;
	}
	header("Location: $url");
}

