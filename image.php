<?php
header("Content-type: image/png");
if (empty($_GET['a']) or empty($_GET['q']) or empty($_GET['n'])) {
	die();
}
$answer = htmlspecialchars($_GET['a']);
$question = htmlspecialchars($_GET['q']);
$name = htmlspecialchars($_GET['n']);

if (strlen($question) > 45) { 
	$question = mb_substr($question, 0, 45);
}
if (strlen($answer) > 96) { 
	$answer = mb_substr($answer, 0, 96);
}

$im = imagecreatefromjpeg("i/screen.jpg");
$white = imagecolorallocate($im, 255, 255, 255);
$px = (imagesx($im) - 5	* strlen($question)) / 2;
$font = 'fonts/serif-italic.ttf';
imagettftext($im, 11, 0, $px, 110, $white, $font, $question);

$font = 'fonts/serif-bold.ttf';
if (strlen($answer) > 66) {
	$first = mb_substr($answer, 0, 33);
	$second = mb_substr($answer, 33, 33);
	$third = mb_substr($answer, 66);
	$px = (imagesx($im) - 7.4 * strlen($first)) / 2;
	imagettftext($im, 18, 0, $px, 145, $white, $font, $first);	
	$px = (imagesx($im) - 7.4 * strlen($second)) / 2;
	imagettftext($im, 18, 0, $px, 180, $white, $font, $second);
	$px = (imagesx($im) - 7.4 * strlen($third)) / 2;
	imagettftext($im, 18, 0, $px, 215, $white, $font, $third);	
} else {
	$px = (imagesx($im) - 7.5 * strlen($answer)) / 2;
	imagettftext($im, 18, 0, $px, 180, $white, $font, $answer);	
}

imagepng($im, $name);
imagedestroy($im);