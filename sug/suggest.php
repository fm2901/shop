<?php
// подключаем основной класс  
require_once('suggest.class.php');
$suggest = new Suggest();
// перменная $keyword - фраза для поиска

//$keyword = iconv("CP1251","UTF8",$_REQUEST['term']);
$keyword = $_REQUEST['term'];

if(ob_get_length()) ob_clean();
// заголовки необходимы для браузеров
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT' ); 
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT'); 
header('Cache-Control: no-cache, must-revalidate'); 
header('Pragma: no-cache');
header('Content-Type: text/json; charset=utf8;');
// отсылаем данные клиенту
echo $suggest->getSuggestions($keyword);
?>
