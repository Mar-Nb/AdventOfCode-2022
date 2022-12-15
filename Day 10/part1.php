<h1>Advent Of Code - Day 10, Part 1</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$cycles = 0;
$x = array(1);
$current = 1;
$res = array();
$sigStr = 0;

if ($file) {
  while (($line = fgets($file)) !== false) {
  	$ope = explode(" ", trim($line));
  	
  	switch ($ope[0]) {
  		case "noop": $cycles++; break;
  		case "addx":
  			$cycles += 2;
  			$current += intval($ope[1]);
  			$x[$cycles] = $current;
  			break;
  		default: break;
  	}
  }
  
  foreach (array(20,60,100,140,180,220) as $k => $nthcycle) {
  	$tmp = array_filter($x, function ($v, $k) use ($nthcycle) { return $k < $nthcycle; }, ARRAY_FILTER_USE_BOTH);
		$res[$nthcycle] = array_reverse($tmp)[0];
  }

  echo "<pre>" . print_r($res) . "</pre>";
  
  foreach ($res as $k => $v) { $sigStr += intval($k) * $v; }

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
<p>Somme de la force des signaux : <?= $sigStr ?></p>
