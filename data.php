<?php
	require_once('player.php');

	//全牌データを用意する
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
	foreach ($same_kinds as $same_kind) {
		$pai["West{$same_kind}"] = "./mahjong01/48/kz3.png";
		$pai["South{$same_kind}"] = "./mahjong01/48/kz2.png";
		$pai["East{$same_kind}"] = "./mahjong01/48/kz1.png";
		$pai["North{$same_kind}"] = "./mahjong01/48/kz4.png";
		$pai["White{$same_kind}"] = "./mahjong01/48/sg1.png";
		$pai["Green{$same_kind}"] = "./mahjong01/48/sg2.png";
		$pai["Red{$same_kind}"] = "./mahjong01/48/sg3.png";
	}

	# 全牌データから指定された牌数の捨て牌をランダムに取得し、取得した牌のデータは全牌データから削除する
	function discardedTiles($pai, $tiles){
		$discarded_tiles = array();
		$discarded_tiles_index = array_rand($pai, $tiles);
		shuffle($discarded_tiles_index);
		foreach ($discarded_tiles_index as $discarded_tile_key) {
			#print_r($pai[$discarded_tile_key]);
			array_push($discarded_tiles, $pai[$discarded_tile_key]);
			unset($pai[$discarded_tile_key]);
		}
		return array($pai, $discarded_tiles);
	}

	# 各プレイヤーごとのインスタンス作成
	list($pai, $discarded_tiles) = discardedTiles($pai, $_POST["turn_num"]);
	$player1 = new Player('player1',$discarded_tiles, 'East');
	list($pai, $discarded_tiles) = discardedTiles($pai, $_POST["turn_num"]);
	$player2 = new Player('player2',$discarded_tiles, 'South');
	list($pai, $discarded_tiles) = discardedTiles($pai, $_POST["turn_num"]);
	$player3 = new Player('player3',$discarded_tiles, 'West');
	list($pai, $discarded_tiles) = discardedTiles($pai, $_POST["turn_num"]);
	$player4 = new Player('player4',$discarded_tiles, 'North');
?>