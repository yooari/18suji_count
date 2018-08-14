<?php
	class Player
	{
		protected $name;// プレイヤー名
		// protected $pai_num; // 捨て牌数（最小値、最大値の制限もあったほうがよいかも）
		protected $image;// プレイヤーが作成した麻雀の河（１～１８牌の麻雀牌画像）
		protected $position; //プレイヤーの座席位置

		public function __construct($name, $image, $position)
		{
			$this->name = $name;
			$this->image = $image;
			$this->position = $position;
		}
		public function getName() {
			return $this->name;
		}
		// 捨て牌画像を取得する
		public function getImage() {
		    return $this->image;
		}
		public function getPosition() {
		    return $this->position;
		}
	}
?>