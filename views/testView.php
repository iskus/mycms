<?php

	class testView extends View {

		protected function doContent() {
			foreach (Data::$alphabets as $lang => $alphabet) {
				self::$doc['#main']->append("<div class='{$lang} alpha'></div>");
				foreach ($alphabet as $letter) {
					if (array_key_exists($letter, $this->data['alphabets'][$lang])) {
						$class = 'active';
					} else {
						$class = 'empty';
					}
					self::$doc['#main .'.$lang]->append("<span class='{$class}'>{$letter}</span>");
				}
			}

			self::$doc['#main div span']->filter(':first')->attr('class','used');
			self::$doc['.alpha']->filter(':last')->after('<div class="list"></div>');
			foreach ($this->data['books'] as $book) {
				self::$doc['.list']->append("<div class='book'>".$book['title']."</div>");
			}
		}

	}