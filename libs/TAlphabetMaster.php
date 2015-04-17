<?php

	trait TAlphabetMaster {
		public $_letter = 'A';
		public $_field = 'title';
		public $_table = 'books';
		public $_start = 0;
		public $_step = 20;
		public $_countsData = [];
		public $_listData = [];
		public $_DB;

		public function _init($options) {
			if (is_array($options)) {
				foreach ($options as $key => $val) {
					if (property_exists($this, '_' . $key)) {
						$this->{'_' . $key} = $this->_DB->escape_str($val);
					} else {
						throw new InvalidArgumentException(__CLASS__ . " said:
						Why you pass me invalid option >>{$key}<<!");
					}
				}
				$this->_letter = mb_substr(trim($this->_letter), 0, 1);
			}

		}

		public function _getCountsData() {
			$sql = "SELECT IF (SUBSTR(TRIM({$this->_field}),1,4) == 'the',
							SUBSTR(TRIM({$this->_field}),5,1),
							SUBSTR(TRIM({$this->_field}),1,1)
						) AS letter,
						COUNT({$this->_field}) AS total, lang
						FROM {$this->_table} WHERE {$this->_field} <> '' GROUP BY letter;";

			if ($result = $this->_DB->query($sql)) {
				while ($row = $result->fetch_assoc()) {
					$this->_countsData[$row['lang']][mb_strtoupper($row['letter'])] = $row['total'];
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
