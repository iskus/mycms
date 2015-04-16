<?php
	namespace libs;

	class TestAlphabetMaster {
		public $_letter;
		public $_field;
		public $_table;
		public $_start = 0;
		public $_step = 20;
		public $_countsData = [];
		public $_listData = [];
		public $_DB;

		public function __construct(\mysqli $DB) {
			$this->_DB = $DB;
		}

		public function _init($options) {
			if (is_array($options)) {
				foreach ($options as $key => $val) {
					if (property_exists($this, '_' . $key)) {
						$this->{'_' . $key} = $this->_DB->escape_string($val);
					} else {
						throw new \InvalidArgumentException(__CLASS__ . " said:
						Why you pass me invalid option >>{$key}<<!");
					}
				}
				$this->_letter = mb_substr(trim($this->_letter), 0, 1);
			}

		}

		public function _getCountRowsForEveryLetter() {
			$sql =
				"SELECT IF (SUBSTR(TRIM({$this->_field}),1,4) = 'the',
							SUBSTR(TRIM({$this->_field}),5,1),
							SUBSTR(TRIM({$this->_field}),1,1)) AS letter,
						COUNT({$this->_field}) AS total
						FROM {$this->_table}
						WHERE {$this->_field} <> '' GROUP BY letter;";

			if ($result = $this->_DB->query($sql)) {
				while ($row = $result->fetch_assoc()) {
					$this->_countsData[mb_strtoupper($row['letter'])] = $row['total'];
				}
			}


			return $this->_countsData;

		}

		public function _getListData($options = false) {
			$this->_init($options);

			$sql = "SELECT * FROM {$this->_table}
				WHERE UPPER(TRIM({$this->_field})) RLIKE '^(THE )?{$this->_letter}(.)*$'
				LIMIT {$this->_start}, {$this->_step}";

			$result = $this->_DB->query($sql);
			while ($row = $result->fetch_assoc()) {
				$this->_listData[] = $row;
			}

			return $this->_listData;
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
