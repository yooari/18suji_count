<?php
	class Pai
	{
		protected $name;
		protected $image;
		// まずは配列での実現を目指そう
		// 実際このクラスを作るならNoや種類という属性があるほうが管理しやすいのかもしれない
		public function __construct($name, $image)
		{
			$this->name = $name;
			$this->image = $image;
		}
		public function getName() {
			return $this->name;
		}

		public function getImage() {
		    return $this->image;
		}
	}
?>