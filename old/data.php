<?php
	// require_once('pai.php');

	// // 牌の名前と牌の画像データを持つ牌のインスタンスを作成する


	// // ここの書き方と同じように配列を作成すればよさげ。



	// for ($i=1; $i <= 9 ; $i++) {
	// 	for ($j=1; $j <= 4; $j++) {
	// 		${"mz".$i."_".$j} = new Pai('mz'.$i, '../mahjong01/48/wz'.$i);
	// 		${"pz".$i."_".$j} = new Pai('pz'.$i, '../mahjong01/48/pz'.$i);
	// 		${"sz".$i."_".$j} = new Pai('sz'.$i, '../mahjong01/48/sz'.$i);
	// 	}
	// }
	// for ($j=1; $j <= 4; $j++) {
	// 	${"West"."_".$j} = new Pai('West', '../mahjong01/48/kz3');
	// 	${"South"."_".$j}  = new Pai('South', '../mahjong01/48/kz2');
	// 	${"East"."_".$j}  = new Pai('East', '../mahjong01/48/kz1');
	// 	${"North"."_".$j}  = new Pai('North', '../mahjong01/48/kz4');
	// 	${"White"."_".$j}  = new Pai('White', '../mahjong01/48/sg1');
	// 	${"Green"."_".$j}  = new Pai('Green', '../mahjong01/48/sg2');
	// 	${"Red"."_".$j}  = new Pai('Red', '../mahjong01/48/sg3');
	// }

	// echo $mz9->getName().'<br>';

	// // 指定された牌種を表示する関数
	// function pai_show($pai_string){
	// 	// 白
	// 	if(strpos($pai_string, 'White')){

	// 	}
	// 	// 字牌以外
	// }

	//全ての牌種データを用意する
	$pai = array();

	$suits_num = 9;//数牌の種類の数
	$suits = array('m','p','s');// 数牌種類
	$honours = array('West','South','East','North','White','Green','Red');// 字牌種類
	$same_kinds =  array('A','B','C','D');//同種牌の種類
	$discarded_tiles_length = 6;// 捨て牌一段ごとの長さ

	for ($i=1; $i <= $suits_num ; $i++) {
		foreach ($same_kinds as $same_kind) {
			$pai["mz{$i}{$same_kind}"] = "./mahjong01/48/wz{$i}.png";
			$pai["pz{$i}{$same_kind}"] = "./mahjong01/48/pz{$i}.png";
			$pai["sz{$i}{$same_kind}"] = "./mahjong01/48/sz{$i}.png";
		}
	}
	// print_r($pai);
	foreach ($same_kinds as $same_kind) {
		$pai["West{$same_kind}"] = "./mahjong01/48/kz3.png";
		$pai["South{$same_kind}"] = "./mahjong01/48/kz2.png";
		$pai["East{$same_kind}"] = "./mahjong01/48/kz1.png";
		$pai["North{$same_kind}"] = "./mahjong01/48/kz4.png";
		$pai["White{$same_kind}"] = "./mahjong01/48/sg1.png";
		$pai["Green{$same_kind}"] = "./mahjong01/48/sg2.png";
		$pai["Red{$same_kind}"] = "./mahjong01/48/sg3.png";
	}

	// for ($j=1; $j <= 4; $j++) {
	// 	${"West"."_".$j} = new Pai('West', './mahjong01/48/kz3');
	// 	${"South"."_".$j}  = new Pai('South', './mahjong01/48/kz2');
	// 	${"East"."_".$j}  = new Pai('East', './mahjong01/48/kz1');
	// 	${"North"."_".$j}  = new Pai('North', './mahjong01/48/kz4');
	// 	${"White"."_".$j}  = new Pai('White', './mahjong01/48/sg1');
	// 	${"Green"."_".$j}  = new Pai('Green', './mahjong01/48/sg2');
	// 	${"Red"."_".$j}  = new Pai('Red', './mahjong01/48/sg3');
	// }


	// // 数牌データ
	// for ($i=1; $i <= $suits_num; $i++) {
	// 	foreach ($same_kinds as $same_kind) {
	// 		foreach ($suits as $suit) {
	// 			$suits_data = $i.$suit.$same_kind;
	// 			array_push($pai,$suits_data);
	// 		}
	// 	}
	// }
	// // 字牌データ
	// foreach ($same_kinds as $same_kind) {
	// 	foreach ($honours as $honour) {
	// 		$honours_data = $honour.$same_kind;
	// 		array_push($pai,$honours_data);
	// 	}
	// }

	// #print_r($pai);

	# 指定された捨て牌数の捨て牌をランダムに取得
	function discardedTiles($pai, $tiles){
		$discarded_tiles = array();
		$discarded_tiles_index = array_rand($pai, $tiles);
		shuffle($discarded_tiles_index);
		foreach ($discarded_tiles_index as $discarded_tile_key) {
			#print_r($pai[$discarded_tile_key]);
			array_push($discarded_tiles, $pai[$discarded_tile_key]);
		}
		return $discarded_tiles;
	}

?>