<?php

// подключаем конфигурационный файл
require_once('config.php');

// класс серверной стороны создающий json объект для передачи jQuery
class Suggest
{
  // закрытая переменная - класс для работы с базой 
  private $mMysqli;
  
  // конструктор класса
  function __construct() 
  {   
    // подключаемся к базе данных
    $this->mMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, 
                                                          DB_DATABASE); 
	$this->mMysqli->set_charset("utf8");														  
  }
  
  // деструктор   
  function __destruct() 
  {
    $this->mMysqli->close();
  }
  
  // функция возвращающая json объект
  public function getSuggestions($keyword)
  {
    $patterns = array('/\s+/', '/"+/', '/%+/');
    $replace = array('');
    $keyword = preg_replace($patterns, $replace, $keyword);
    // запрос к базе
    if($keyword != '')
      $query = 'SELECT * ' .
               'FROM product ' . 
               'WHERE name LIKE "' . $keyword . '%"';
    else
      $query = 'SELECT * ' .
 
               'FROM product ' .
               'WHERE name=""'; 
    // выполняем запрос SQL
    $result = $this->mMysqli->query($query);
    $output = '[';    
    // результат формируется циклом 
    if($result->num_rows)
		$i = 0;
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$i++;
			if($i == 1) {
				$output .= '{ "id": "'.$row['id'].'", 
				"value": "'.$row['name'].'", 
				"name": "'.$row['name'].'", 
				"id_postavshik": "'.$row['id_postavshik'].'", 
				"price_in": "'.$row['price_in'].'", 
				"percent": "'.$row['percent'].'", 
				"exp_date": "'.$row['exp_date'].'", 
				"shcode": "'.$row['shcode'].'", 
				"price_out": "'.$row['price_out'].'"}';
			}else {
				$output .= ',{ "id": "'.$row['id'].'", 
				"value": "'.$row['name'].'",
				"name": "'.$row['name'].'",
				"id_postavshik": "'.$row['id_postavshik'].'",
				"price_in": "'.$row['price_in'].'", 
				"percent": "'.$row['percent'].'", 
				"exp_date": "'.$row['exp_date'].'", 
				"shcode": "'.$row['shcode'].'", 
				"price_out": "'.$row['price_out'].'"}';
			}
		}
   // закрываем соединение и освобождаем ресурсы
    $result->close();
    // закрывающий тег json формата
    $output .= ']';   
    // возвращаем данные
    return $output;  
  }
//конец класса
}
?>
