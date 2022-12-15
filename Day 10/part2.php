<h1>Advent Of Code - Day 10, Part 2</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$cycles = 1;
$x = array(1);
$current = 1;
$pos = 0;
$crt = "";
$screen = array();

function drawCRT(&$p, $cur, &$crt, &$cy) {
	if (in_array($p, range($cur - 1, $cur + 1))) { $crt .= "#"; }
	else { $crt .= "."; }
	$cy++; $p++;
} 

if ($file) {
  while (($line = fgets($file)) !== false) {
  	$ope = explode(" ", trim($line));
  	
  	switch ($ope[0]) {
  		case "noop":
  			echo "<p>[NOOP] Cycle : $cycles, Pos : $pos, Current : $current </p>";
  			drawCRT($pos, $current, $crt, $cycles);
//				if (in_array($pos, range($current - 1, $current + 1))) { $crt .= "#"; }
//				else { $crt .= "."; }
  			//$cycles++; $pos++;
  			
  			echo "<pre>" . $crt . "</pre>";
  			if ($pos >= 40) { $screen[] = $crt; $crt = ""; $pos = 0; }
  			break;
  			
  		case "addx":
  			echo "<p>[ADDX] Cycle : $cycles, Pos : $pos, Current : $current </p>";
//				if (in_array($pos, range($current - 1, $current + 1))) { $crt .= "#"; }
//				else { $crt .= "."; }
				drawCRT($pos, $current, $crt, $cycles);
				echo "<pre>" . $crt . "</pre>";
				if ($pos >= 40) { $screen[] = $crt; $crt = ""; $pos = 0; }
//				$pos++; $cycles++;
				
//				if (in_array($pos, range($current - 1, $current + 1))) { $crt .= "#"; }
//				else { $crt .= "."; }
				drawCRT($pos, $current, $crt, $cycles);
				$current += intval($ope[1]);
				$x[$cycles] = $current;
				if ($pos >= 40) { $screen[] = $crt; $crt = ""; $pos = 0; }
				//$pos++; $cycles++;
  			
				echo "<p>[ADDX] Cycle : $cycles, Pos : $pos, Current : $current </p>";
				echo "<pre>" . $crt . "</pre>";
  			break;
  		default: break;
  	}
  	
  	//$pos++;
  	echo "<hr>";
  }
  
/*  foreach (array(20,60,100,140,180,220) as $k => $nthcycle) {
  	$tmp = array_filter($x, function ($v, $k) use ($nthcycle) { return $k < $nthcycle; }, ARRAY_FILTER_USE_BOTH);
		$res[$nthcycle] = array_reverse($tmp)[0];
  }
*/

  foreach ($screen as $k => $v) { echo "<pre>" . $v . "</pre>"; }
  
  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
