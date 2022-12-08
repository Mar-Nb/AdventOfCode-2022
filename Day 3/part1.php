<h1>Advent Of Code - Day 3, Part 1</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");

if ($file) {
  $itemType = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $somme = 0; $num = 1;

  while (($line = fgets($file)) !== false) {
    echo "<h3>Elfe n°$num</h3>";
    $sac = trim($line);
    echo "<p>" . $sac . "</p>";

    $compartiments = str_split($sac, strlen($sac) / 2);
    $type = implode(array_unique(array_intersect(str_split($compartiments[0]), str_split($compartiments[1]))));
    echo "<p>" . (strpos($itemType, $type) + 1) . "</p>";
    $somme += strpos($itemType, $type) + 1;
    $num++;
  }

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
<p>Score des priorités : <b><u><?= $somme ?></u></b></p>