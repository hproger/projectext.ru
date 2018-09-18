<?
$userType = '';
if (isset($_SESSION['user'])) {
	
	if ($_SESSION['user']->type_user == 'exp') {
		$userType = "Эксперт";
	}
	else if ($_SESSION['user']->type_user == 'vol') {
		$userType = "Волонтёр";
	}
}
echo "Это страница авторизованного пользоватея типа - $userType !";

?>