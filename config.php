<?
// ВКЛЮЧЕНИЕ ВЫВОДА ОШИБОК И ПРЕДУПРЕЖДЕНИЙ
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

// УСТАНОВКА КОДИРОВКИ
	mb_internal_encoding("UTF-8");

	session_start();
	
// ДАННЫЕ ДЛЯ ПОДКЛЮЧЕНИЯ К БД
	$host = 'localhost'; // адрес сервера 
	$database = 'projectx'; // имя базы данных
	$user = 'root'; // имя пользователя
	$password = ''; // пароль

// ПОДКЛЮЧАЕМСЯ К СЕРВЕРУ
	$link = mysqli_connect($host, $user, $password, $database) 
	    or die("Ошибка " . mysqli_error($link));

// УСТАНОВКА КОДИРОВКИ СОЕДИНЕНИЯ
	mysqli_set_charset($link, 'utf8'); 

// выполняем операции с базой данных

	

	/*$query ="SELECT * FROM phones";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	if($result)
	{
	    while ($row = mysqli_fetch_assoc($result)) {
            
        }
         
        // очищаем результат
        mysqli_free_result($result);
	}*/

	// закрываем подключение
	// mysqli_close($link);

	
?>