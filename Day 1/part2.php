<h1>Advent Of Code - Day 1, Part 2</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$num = 1; $listeCal = array(); $max = array();

function totalEtMax(&$max, &$liste) {
  $total = array_sum($liste);
  echo "<p>Total des calories : <b>" . $total . "</b></p><br><br>";
  $liste = array();
  $max[] = $total;
}

if ($file) {
  echo "<h3>Elfe n°$num</h3>";
  while (($line = fgets($file)) !== false) {
    $texte = trim($line);

    if (strlen($texte)) {
      echo "<p>" . $texte . "</p>";
      $listeCal[] = intval($texte);
    }
    
    switch ($line) {
      case "\n":
        totalEtMax($max, $listeCal);
        $num++;
        echo "<h3>Elfe n°$num</h3>";
        break;
      
      default: break;
    }

  }

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  // Pour le dernier elfe du fichier
  totalEtMax($max, $listeCal);
  fclose($file);
}

rsort($max);
?>

<hr>
<p>Quantité de calorie max transportée par les Elfes : <b><u><?= $max[0] ?></u></b></p>
<p>Total de calorie transporté par les trois Elfes les plus chargés : <b><u><?= array_sum(array($max[0], $max[1], $max[2])) ?></u></b></p>
