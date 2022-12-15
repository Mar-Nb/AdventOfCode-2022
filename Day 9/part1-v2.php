<h1>Advent Of Code - Day 9, Part 1</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$headPos = array();
$tailPos = array();

function lastPos ($array) { return end($array); }

if ($file) {

	// Starting block
	$headPos[] = array(0, 0);
	$tailPos[] = array(0, 0);
	$current = array(0, 0);
	$lastMove = "";
	
  while (($line = fgets($file)) !== false) {
  	$move = explode(" ", trim($line));
  	$unitMove = intval($move[1]);
  	
  	switch ($move[0]) {
  		case "R":
  			echo "<p>RIGHT : $move[1]</p>";
  			//if ($lastMove == "D" || ($lastMove == "U")) { $headPos[count($headPos) - 1]["corner"] = true; }
  			
  			for ($i = 0; $i < $unitMove; $i++) {
					$current[0]++;
					echo "<pre>Current : " . print_r($current) . "</pre>";
					$headPos[] = array($current[0], $current[1]);
  			}
  			
  			for ($j = $unitMove - 1; $j > 0; $j--) {
  				$tail = $current[0] - $j;
  				$tailPos[] = array($tail, $current[1]);
  			}
  			
  			break;
  		case "L":
  			echo "<p>LEFT : $move[1]</p>";
  			//if ($lastMove == "D" || ($lastMove == "U")) { $headPos[count($headPos) - 1]["corner"] = true; }
  			
  			for ($i = 0; $i < $unitMove; $i++) {
					$current[0]--;
					echo "<pre>Current : " . print_r($current) . "</pre>";
					$headPos[] = array($current[0], $current[1]);
				}
				
  			for ($j = $unitMove - 1; $j > 0; $j--) {
  				$tail = $current[0] + $j;
  				$tailPos[] = array($tail, $current[1]);
  			}
				
  			break;
  		case "D":
  			echo "<p>DOWN : $move[1]</p>";
  			//if ($lastMove == "L" || ($lastMove == "R")) { $headPos[count($headPos) - 1]["corner"] = true; }
  			
  			for ($i = 0; $i < $unitMove; $i++) {
					$current[1]--;
					echo "<pre>Current : " . print_r($current) . "</pre>";
					$headPos[] = array($current[0], $current[1]);
				}
				
  			for ($j = $unitMove - 1; $j > 0; $j--) {
  				$tail = $current[1] + $j;
  				$tailPos[] = array($current[0], $tail);
  			}
				
  			break;
  		case "U":
  			echo "<p>UP : $move[1]</p>";
  			//if ($lastMove == "L" || ($lastMove == "R")) { $headPos[count($headPos) - 1]["corner"] = true; }
  			
  			for ($i = 0; $i < $unitMove; $i++) {
					$current[1]++;
					echo "<pre>Current : " . print_r($current) . "</pre>";
					$headPos[] = array($current[0], $current[1]);
				}
				
  			for ($j = $unitMove - 1; $j > 0; $j--) {
  				$tail = $current[1] - $j;
  				$tailPos[] = array($current[0], $tail);
  			}
				
  			break;
  		default: break;
  	}
  	
  	$lastMove = $move[0];
  }
  	
  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }
  
//  $tailPos = array();
//  foreach ($headPos as $k => $v) {
//  	if ((! key_exists("corner", $v)) && (! in_array($v, $tailPos))) { $tailPos[] = $v; }
//  }

	$result = array();
	foreach ($tailPos as $k => $v) {
		if (! in_array($v, $result)) { $result[] = $v; }
	}
  
  fclose($file);
}
?>

<hr>
<!--<p>Nombre de position parcourues par TAIL : <?= count($result) ?></p>-->
<!--<pre><?= print_r($headPos, true) ?></pre>-->
<pre><?= print_r($result, true) ?></pre>
