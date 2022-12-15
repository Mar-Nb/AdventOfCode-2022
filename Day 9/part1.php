<h1>Advent Of Code - Day 9, Part 1</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$headPos = array();
$tailPos = array();
$offset = 1;
$lastMove = "";

if ($file) {

	// Starting block
	//$headPos[] = array(0, 0);
	$tailPos[] = array(0, 0);
	$current = array(0, 0);
	
  while (($line = fgets($file)) !== false) {
  	$move = explode(" ", trim($line));
  	$unitMove = intval($move[1]);
  	
  	switch ($move[0]) {
  		case "R":
  			echo "<p>RIGHT : $move[1]</p>";
  			for ($i = 0; $i < $unitMove; $i++) {
  				$current[0]++;
  				$headPos[] = array($current[0], $current[1]);
  			}  			
  			  			  			
  			break;
  		case "L":
  			echo "<p>LEFT : $move[1]</p>";
  			for ($i = 0; $i < $unitMove; $i++) {
  				$current[0]--;
  				$headPos[] = array($current[0], $current[1]);
  			}  			
  			
  			break;
  		case "D":
  			echo "<p>DOWN : $move[1]</p>";
  			for ($i = 0; $i < $unitMove; $i++) {
  				$current[1]--;
  				$headPos[] = array($current[0], $current[1]);
  			}  			
  			
  			break;
  		case "U":
  			echo "<p>UP : $move[1]</p>";
  			for ($i = 0; $i < $unitMove; $i++) {
  				$current[1]++;
  				$headPos[] = array($current[0], $current[1]);
  			}
  			
  			break;
  		default: break;
  	}
  	
		$tmp = array_slice($headPos, $offset, $unitMove - 1);
		
		// Merge dans $tailPos
		foreach ($tmp as $k => $v) {
			if (!in_array($v, $tailPos)) { $tailPos[] = $v; }
		}
		
		
		$lastMove = $move[0];
		//$tailPos = array_merge($tailPos, $tmp);
		$offset += $unitMove;
		//echo "<pre>" . print_r($tailPos, true) . "</pre";

  }
  	
  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }
  
  fclose($file);
}
?>

<hr>
<!--<p>Nombre de position parcourues par TAIL : <?= count($result) ?></p>-->
<pre><?= print_r($tailPos, true) ?></pre>
