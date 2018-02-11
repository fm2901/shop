<?php
	session_start();
	include("db.php");
	include("tools.php");
	$keyword = 123;

if(ob_get_length()) ob_clean();
// заголовки необходимы для браузеров
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT' ); 
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT'); 
header('Cache-Control: no-cache, must-revalidate'); 
header('Pragma: no-cache');
header('Content-Type: text/json; charset=windows-1251;');
// отсылаем данные клиенту
echo $keyword;