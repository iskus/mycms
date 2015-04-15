<?php

	class TestAlphabetMaster {
		public $_letter;
		public $_field;
		public $_table;
		public $_start = 0;
		public $_step = 20;
		public $_countsData = [];
		public $_listData = [];
		public $_DB;

		public function __construct(mysqli $DB) {
			$this->_DB = $DB;
		}

		public function _init($options) {
			if (is_array($options)) {
				foreach ($options as $key => $val) {
					if (property_exists($this, '_' . $key)) {
						$this->{'_' . $key} = $this->_DB->escape_string($val);
					} else {
						throw new InvalidArgumentException(__CLASS__ . " said:
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
