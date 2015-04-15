<?php

	class Author extends Model {

		public function getAllAuthors() {
			$query = "SELECT * FROM authors";
			var_dump($this->Db);
//			$insert = "INSERT INTO authors (name, description, genre_id) VALUES ('author', 'blablablablab', 2)";
//			for ($i = 0; $i <= 150; $i++) {
//				$insert .= ", ('" . substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm'), 0, 7) . $i
//					. "', '" . str_shuffle('qwertyuiopasdfghjklzxcvbnm') . $i . " " . str_shuffle('qwertyuiopasdfghjklzxcvbnm') . "', " .
//				rand(1, 5) . ")";
//			}
//			$insert .= ";";
			return $this->Db->query($query);
		}

	}
