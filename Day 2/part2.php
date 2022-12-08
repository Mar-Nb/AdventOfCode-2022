<h1>Advent Of Code - Day 2, Part 2</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$score = 0;

if ($file) {
  while (($line = fgets($file)) !== false) {
    $texte = trim($line);
    $round = explode(" ", $texte);
    $shapePoint = 0;
    $roundPoint = 0;
    
    switch ($round[1]) {
      case "X":
        // Loss, 0 point
        $shapePoint = $round[0] == "A" ? 3 : ($round[0] == "B" ? 1 : 2);
        // $roundPoint = 0;
        break;
        
      case "Y":
        // Draw, 3 points
        $shapePoint = $round[0] == "A" ? 1 : ($round[0] == "B" ? 2 : 3);
        $roundPoint = 3;
        break;
      
      case "Z":
        // Victory, 6 points
        $shapePoint = $round[0] == "A" ? 2 : ($round[0] == "B" ? 3 : 1);
        $roundPoint = 6;
        break;

      default: break;
    }

    $score += $roundPoint + $shapePoint;    
    echo "<p>" . $texte . "</p>";
  }

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
<p>Score total : <b><u><?= $score ?></u></b></p>