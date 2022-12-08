<h1>Advent Of Code - Day 4, Part 1</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");

if ($file) {
  $overlaps = 0;

  while (($line = fgets($file)) !== false) {
    $elfes = array(); $nbZones = array();

    echo "<p>" . trim($line) . "</p>";
    $pair = explode(",", trim($line));

    for ($i = 0; $i < 2; $i++) { 
      $limites = explode("-", $pair[$i]);
      $elfes[] = range($limites[0], $limites[1]);
      $nbZones[] = count($elfes[$i]);
    }

    // Elfe 1 a plus de zones à nettoyer qu'Elfe 2 
    if ($nbZones[0] > $nbZones[1]) {

      // Min zone de Elfe 1 < Min zone de Elfe 2, Max zone de Elfe 1 > à Max zone de Elfe 2
      if ($elfes[0][0] <= $elfes[1][0] && $elfes[0][$nbZones[0] - 1] >= $elfes[1][$nbZones[1] - 1]) {
        echo "<p><b>OVERLAPS</b></p>";
        $overlaps++;
      }
    } else {
      if ($elfes[1][0] <= $elfes[0][0] && $elfes[1][$nbZones[1] - 1] >= $elfes[0][$nbZones[0] - 1]) {
        echo "<p><b>OVERLAPS</b></p>";
        $overlaps++;
      }
    }
  }

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
<p>Nombre d'overlaps : <b><u><?= $overlaps ?></u></b></p>