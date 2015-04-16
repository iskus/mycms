<?php
	namespace app\model;
	use core\Model as Model;
	use core\sources\UsefulData as UsefulData;

	class Author extends Model {

		public function getAllAuthors() {
			$query = "SELECT * FROM books";
			$ruAlpha = UsefulData::$alphabets['ru'];
			$enAlpha = implode('', UsefulData::$alphabets['en']);

			$insert = "INSERT INTO books (title, description, author_id) VALUES ('book', 'рпщп щшгпр вкшдпркщшпршо', 2)";
			for ($i = 0; $i <= 10; $i++) {
				shuffle($ruAlpha);
				$insert .= ", ('"
					. trim(
						mb_substr(
							mb_strtolower(
								implode('', $ruAlpha)
							), 0, rand(2, 12)
						)
					) . $i
					. "', '"
					. implode('', $ruAlpha) . $i . " "
					. implode('',
						array_reverse($ruAlpha)
					)
					. "', "
					. rand(1, 150) . ")";
			}
			$insert .= ";";
			echo $insert;
			$update = "UPDATE books SET title = CONCAT('the ', title) WHERE id > 400;";
			//return $this->Db->query($insert);
		}

	}
