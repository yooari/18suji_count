<?php
require_once('data.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>残り筋数カウント練習機</title>
	<link rel="stylesheet" href="" media="all" />
</head>
<body>
	<!-- <?php echo $pai[2]; ?> -->
	<!-- <?php echo "<br>";?> -->
	捨て牌：
	<?php echo "<br>";?>
	<?php $discarded_tiles = discardedTiles($pai, 18) ?>
	<?php foreach ($discarded_tiles as $discarded_tile) :?>
		<img src="<?php echo $discarded_tile ?>">
	<?php endforeach ?>
</body>
</html>
