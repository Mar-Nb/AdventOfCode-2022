<h1>Advent Of Code - Day 2, Part 1</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$score = 0;

if ($file) {
  while (($line = fgets($file)) !== false) {
    $texte = trim($line);
    $round = explode(" ", $texte);
    $status = ""; $shapePoint = 0;
    
    switch ($round[1]) {
      case "X":
        // Pierre, 1 point
        $status = $round[0] == "A" ? "draw" : ($round[0] == "B" ? "loss" : "victory");
        $shapePoint = 1;
        break;
        
      case "Y":
        // Papier, 2 points
        $status = $round[0] == "A" ? "victory" : ($round[0] == "B" ? "draw" : "loss");
        $shapePoint = 2;
        break;
      
      case "Z":
        // Ciseau, 3 points
        $status = $round[0] == "A" ? "loss" : ($round[0] == "B" ? "victory" : "draw");
        $shapePoint = 3;
        break;

      default: break;
    }

    $score += $status == "draw" ? (3 + $shapePoint) : ($status == "loss" ? $shapePoint : (6 + $shapePoint));
    
    echo "<p>" . $texte . "</p>";
    echo "<p>Statut : " . $status . "</p>";
  }

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
<p>Score total : <b><u><?= $score ?></u></b></p>