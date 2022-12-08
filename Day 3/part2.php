<h1>Advent Of Code - Day 3, Part 2</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");

if ($file) {
  $itemType = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $somme = 0; $groupe = 1;
  $sacsGroupe = array();

  while (($line = fgets($file)) !== false) {
    if (count($sacsGroupe)%3 == 0) { echo "<h3>Groupe n°$groupe</h3>"; }
    $sac = trim($line);
    $sacsGroupe[] = $sac;

    echo "<p>" . $sac . "</p>";

    if (count($sacsGroupe) == 3) {
      $type = implode(array_unique(array_intersect(str_split($sacsGroupe[0]), str_split($sacsGroupe[1]), str_split($sacsGroupe[2]))));
      echo "<pre>" . $type . ", prio = " . (strpos($itemType, $type) + 1) . "</pre>";
      $somme += strpos($itemType, $type) + 1;
      $sacsGroupe = array();
      $groupe++;
    }
  }

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
<p>Score des priorités : <b><u><?= $somme ?></u></b></p>