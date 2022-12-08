<h1>Advent Of Code - Day 4, Part 2</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");

if ($file) {
  $overlaps = 0;

  while (($line = fgets($file)) !== false) {
    $elfes = array();

    echo "<p>" . trim($line) . "</p>";
    $pair = explode(",", trim($line));

    for ($i = 0; $i < 2; $i++) { 
      $limites = explode("-", $pair[$i]);
      $elfes[] = range($limites[0], $limites[1]);
    }

    // Est-ce qu'il y a des zones en commun entre Elfe 1 et Elfe 2 ?
    $overlap = count(array_intersect($elfes[0], $elfes[1])) > 0;
    if ($overlap) { $overlaps++; }
  }

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
<p>Nombre d'overlaps : <b><u><?= $overlaps ?></u></b></p>