<h1>Advent Of Code - Day 9, Part 1</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$headPos = array();
$tailPos = array();

function isDiag($head, $tail) {
	$upRight = ($head[0] === $tail[0] + 1) && ($head[1] === $tail[1] + 1);
	$upLeft = ($head[0] === $tail[0] - 1) && ($head[1] === $tail[1] + 1);
	$downRight = ($head[0] === $tail[0] + 1) && ($head[1] === $tail[1] - 1);
	$downLeft = ($head[0] === $tail[0] - 1) && ($head[1] === $tail[1] - 1);
	return ($upRight || $upLeft || $downRight || $downLeft);
}

function isNear($head, $tail) {
	if (isDiag($head, $tail)) { return true; }
	else if (in_array($head[0], range($tail[0] - 1, $tail[0] + 1)) && in_array($head[1], range($tail[1] - 1, $tail[1] + 1))) {
		return true;
	}
	
	return false;
}

if ($file) {

/*	$currentHead = array(1, 1);
	$currentTail = array(0, 0);
	
	echo "HEAD" . print_r($currentHead) . "<br>";
	echo "TAIL" . print_r($currentTail) . "<br>";
	echo "isNear() => " . (isNear($currentHead, $currentTail) ? "True" : "False");
	echo "<br>";
	echo "isDiag() => " . (isDiag($currentHead, $currentTail) ? "True" : "False");
*/

	// Starting block
	$headPos[] = array(0, 0);
	$tailPos[] = array(0, 0);
	$currentHead = array(0, 0);
	$currentTail = array(0, 0);
	
  while (($line = fgets($file)) !== false) {
  	$move = explode(" ", trim($line));
  	$unitMove = intval($move[1]);
		$moveTailDiag = false;
  	
  	switch ($move[0]) {
  		case "R":
  			//echo "<p>RIGHT : $move[1]</p>";
  			for ($i = 0; $i < $unitMove; $i++) {
  				$currentHead[0]++;
  				$headPos[] = array($currentHead[0], $currentHead[1]);
  				
  				if ($moveTailDiag) {
  					$currentTail[1] = $currentHead[1];
  					$currentTail[0]++;
  					$moveTailDiag = false;
  				}
  				else if (isDiag($currentHead, $currentTail)) { $moveTailDiag = true; continue; }
  				else if (isNear($currentHead, $currentTail)) { continue; }
  				else { $currentTail[0]++; }

  				if (! in_array(array($currentTail[0], $currentTail[1]), $tailPos)) { $tailPos[] = array($currentTail[0], $currentTail[1]); }
  			}

				//echo "<pre>" . print_r($tailPos, true) . "</pre>";	
  			break;
  		case "L":
  			//echo "<p>LEFT : $move[1]</p>";
  			for ($i = 0; $i < $unitMove; $i++) {
  				$currentHead[0]--;
  				$headPos[] = array($currentHead[0], $currentHead[1]);
  				
  				if ($moveTailDiag) {
  					$currentTail[1] = $currentHead[1];
  					$currentTail[0]--;
  					$moveTailDiag = false;
  				}
  				else if (isDiag($currentHead, $currentTail)) { $moveTailDiag = true; continue; }
  				else if (isNear($currentHead, $currentTail)) { continue; }
  				else { $currentTail[0]--; }

  				if (! in_array(array($currentTail[0], $currentTail[1]), $tailPos)) { $tailPos[] = array($currentTail[0], $currentTail[1]); }
   			}  			
  			
  			//echo "<pre>" . print_r($tailPos, true) . "</pre>";
  			break;
  		case "D":
  			//echo "<p>DOWN : $move[1]</p>";
  			for ($i = 0; $i < $unitMove; $i++) {
  				$currentHead[1]--;
  				$headPos[] = array($currentHead[0], $currentHead[1]);
  				
  				if ($moveTailDiag) {
  					$currentTail[0] = $currentHead[0];
  					$currentTail[1]--;
  					$moveTailDiag = false;
  				}
  				else if (isDiag($currentHead, $currentTail)) { $moveTailDiag = true; continue; }
  				else if (isNear($currentHead, $currentTail)) { continue; }
  				else { $currentTail[1]--; }

  				if (! in_array(array($currentTail[0], $currentTail[1]), $tailPos)) { $tailPos[] = array($currentTail[0], $currentTail[1]); }
  			}  			
  			
  			break;
  		case "U":
  			//echo "<p>UP : $move[1]</p>";
  			for ($i = 0; $i < $unitMove; $i++) {
  				$currentHead[1]++;
  				$headPos[] = array($currentHead[0], $currentHead[1]);
  				
  				if ($moveTailDiag) {
  					$currentTail[0] = $currentHead[0];
  					$currentTail[1]++;
  					$moveTailDiag = false;
  				}
  				else if (isDiag($currentHead, $currentTail)) { $moveTailDiag = true; continue; }
  				else if (isNear($currentHead, $currentTail)) { continue; }
  				else { $currentTail[1]++; }

  				if (! in_array(array($currentTail[0], $currentTail[1]), $tailPos)) { $tailPos[] = array($currentTail[0], $currentTail[1]); }
  			}
  			
  			//echo "<pre>" . print_r($tailPos, true) . "</pre>";
  			break;
  		default: break;
  	}
  }

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
<pre><?= print_r($tailPos, true) ?></pre>
