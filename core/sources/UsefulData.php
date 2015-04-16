<?php
namespace core\sources;
	class UsefulData {
		public static $alphabets = [
			'ru' => [
				'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т',
				'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'
			],
			'en' => [
				'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
				'U', 'V', 'W', 'X', 'Y', 'Z'
			],
		];

		public static function getRequest($key = '') {

			return empty($_REQUEST[$key]) ? false : $_REQUEST[$key];
		}
	}

	/*
	function countAllByABC(){
	$query = "SELECT IF (SUBSTR(TRIM(`name`),1,4)) = 'the', SUBSTR(TRIM(`name`),5,1), SUBSTR(TRIM(`name`),1,1)) AS letter, COUNT(id) AS total FROM users WHERE `name` <> '' GROUP BY LETTER;";

	$dataset                                    = $mysqli->query($query);
	$aCount = $dataset->fetch_assoc();
	return $aCount;
	}
	$aRuCount = countAllByABC($aRuLetters);
	$aEnCount = countAllByABC($aEnLetters);

		if($_COOKIE['LETTER']){
			$Letter = $_COOKIE['LETTER'];
			setcookie('LETTER', '');
		}else{
			$Letter = '';
		}

	<div class="NavigationLetter">

		foreach ($aRuLetters as $val){
			if($val==$Letter){
				echo '<a class="selectedLetter">'.$val.'</a>&nbsp;'; //Выбранная буква
			}else if(!in_array($val, $aRuCount)){
				echo '<a class="noActiveLetter">'.$val.'</a>&nbsp;'; //Не активные
			}else{
				//Активные, запись в куки при нажатии
				echo '<a class="activeLetter" onclick="$.cookie(\'LETTER\',\''.$val.'\'); window.location.reload();">'.$val.'</a>&nbsp;';
			}
		}
		echo '<br/>';
		foreach ($aEnLetters as $val){
			if($val==$Letter){
				echo '<a class="selectedLetter">'.$val.'</a>&nbsp;'; //Выбранная буква
			}else if(!in_array($val, $aEnCount)){
				echo '<a class="noActiveLetter">'.$val.'</a>&nbsp;'; //Не активные
			}else{
				//Активные, запись в куки при нажатии
				echo '<a class="activeLetter" onclick="$.cookie(\'LETTER\',\''.$val.'\'); window.location.reload();">'.$val.'</a>&nbsp;';
			}
		}
		?>
	</div><br/>
	<div class="letter"><?php echo $Letter; ?></div><br/> //Здесь можно вывести выбранную букву
	Теперь напишем функцию(метод), который будет выводить имена пользователей по заданной букве:
	function userList($letter){
	if(!empty($letter)){
	substr($letter,0,2);
	$query = "SELECT `id`,`name` FROM `users` WHERE `name` LIKE '{$letter}%' ORDER BY `name`;";
	}else{
	$query = "SELECT `id`,`name` FROM `users` ORDER BY `name`;";
	}
	$dataset                                    = $mysqli->query($query);
	$sList = '';
	while($row = $dataset->fetch_assoc()){
	$sList .= "<li>{$row['name']}</li>";
	}
	return $sList;
	}
	Ну и, наконец, выводим отсортированный список пользователей на эту букву(или всех, если буква не задана)
	<div>
		<ul class="userList">
			<?php
			$userList = userList($Letter);
			echo $userList;
			?>
		</ul>
	</div><?php
	/**
	 * Created by JetBrains PhpStorm.
	 * User: anton
	 * Date: 13.07.12
	 * Time: 14:13
	 * To change this template use File | Settings | File Templates.
	 */