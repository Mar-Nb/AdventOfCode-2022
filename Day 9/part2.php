<h1>Advent Of Code - Day 8, Part 2</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$forest = array();
$scenicScore = 0;

$hauteur = 0;
$largeur = 0;

if ($file) {

	// Mappage de la forêt
  while (($line = fgets($file)) !== false) {
  	$hauteur++;
		$forest[] = str_split(trim($line));
		$largeur = count(str_split(trim($line)));		
  }
      
  // Etude de la forêt
	for ($i = 0; $i < $hauteur; $i++) {
		for ($j = 0; $j < $largeur; $j++) {
			// Un arbre sur le bord de la forêt
			if ($i === 0 || ($i === ($hauteur - 1)) || ($j === 0) || ($j === ($largeur - 1))) { continue; }
			
			// Vérification des arbres en intérieur
			$scenic = array("top" => 0, "bottom" => 0, "left" => 0, "right" => 0);
			$current = $forest[$i][$j];
			//echo "<p>Current : $current, ligne $i</p>";
			
			// Colonne
			$col = array_column($forest, $j);
			
			$haut = array_slice($col, 0, $i);
			$haut = array_reverse($haut);
			foreach ($haut as $k => $v) {
				$scenic["top"] += 1;
				if ($v >= $current) { break; }
			}
			
			$bas = array_slice($col, $i + 1);
			foreach ($bas as $k => $v) {
				$scenic["bottom"] += 1;
				if ($v >= $current) { break; }
			}

			// Ligne
			$ligne = $forest[$i];
			$gauche = array_slice($ligne, 0, $j);
			$gauche = array_reverse($gauche);
			foreach ($gauche as $k => $v) {
				$scenic["left"] += 1;
				if ($v >= $current) { break; }
			}
			
			$droite = array_slice($ligne, $j + 1);
			foreach ($droite as $k => $v) {
				$scenic["right"] += 1;
				if ($v >= $current) { break; }
			}
						
			if (array_product($scenic) > $scenicScore) { $scenicScore = array_product($scenic); }
		}		
	}
	
  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
<p><i>Scenic score</i> le plus élevé : <?= $scenicScore ?></p>
