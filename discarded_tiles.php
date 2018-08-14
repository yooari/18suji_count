<?php
require_once('data.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>残り筋数カウント練習機</title>
	<link rel="stylesheet" href="./css/stylesheet.css" media="all" />
</head>
<body>
	<form action="discarded_tiles.php" method="post" accept-charset="utf-8">
		巡目：<input type="text" value="<?php echo $_POST["turn_num"] ?>" name="turn_num">
		<input type="submit" value="決定">
	</form>
					<!-- ページを3*3ブロックの9分割し、左上から右下まで順番に1~9の番号を振ったとしたとき、偶数番号のブロックに捨て牌画像を表示することで雀卓での捨て牌を再現する -->
					<!-- プレイヤーの河データ取得 -->
					<!-- プレイヤーの河を並べる -->
					<!-- 捨て牌は6枚並べたら一段下げる また最終段でも改行-->
	<div class="container">
		<?php $id_count = 0 ?>
		<?php for ($i=0; $i < 9; $i++): ?>
			<!-- 卓上の中心となるサイコロスペース -->
			<?php if($i == 4): ?>
				<div class="dice_space"></div>
			<!-- 不要スペース -->
			<?php elseif ($i % 2 == 0): ?>
				<div class="unnecessary_space">box<?php echo $i ?></div>
			<!-- 捨て牌スペース -->
			<?php else: ?>
				<?php $id_count++?>
				<?php $player = ${"player".$id_count} ?>
				<?php if($i == 1): ?>
					<div class="discarded_space_a">
				<?php elseif($i == 3): ?>
					<div class="discarded_space_b">
				<?php elseif($i == 5): ?>
					<div class="discarded_space_c">
				<?php else: ?>
					<div class="discarded_space_d">
				<?php endif?>
				<?php $discarded_tiles = $player->getImage() ?>
				<?php foreach ($discarded_tiles as $discarded_tile) :?>
					<img src="<?php echo $discarded_tile ?>" >
				<?php endforeach ?>
				</div>
			<?php endif ?>
		<?php endfor; ?>
	</div>
</body>
</html>

