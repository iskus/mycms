<?php

	class Author extends Model {

		public function getAllAuthors() {
			$query = "SELECT * FROM authors";
			var_dump($this->Db);
//			$insert = "INSERT INTO books (title, description, author_id) VALUES ('book', 'blablablablab', 2)";
//			for ($i = 0; $i <= 450; $i++) {
//				$insert .= ", ('" . substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm'), 0, rand(3, 10)) . $i
//					. "', '" . str_shuffle('qwertyuiopasdfghjklzxcvbnm') . $i . " " . str_shuffle('qwertyuiopasdfghjklzxcvbnm') . "', " .
//				rand(1, 150) . ")";
//			}
//			$insert .= ";";
			$update = "UPDATE books SET title = CONCAT('the ', title) WHERE id > 400;";
			return $this->Db->query($query);
		}

	}
