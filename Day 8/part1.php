<h1>Advent Of Code - Day 8, Part 1</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$forest = array();
$visible = 0;

$hauteur = 0;
$largeur = 0;

if ($file) {

	// Mappage de la forêt
  while (($line = fgets($file)) !== false) {
  	$hauteur++;
		$forest[] = str_split(trim($line));
		$largeur = count(str_split(trim($line)));		
  }
  
  //echo "<p>Hauteur : $hauteur, largeur : $largeur</p>";
    
  // Etude de la forêt
	for ($i = 0; $i < $hauteur; $i++) {
		for ($j = 0; $j < $largeur; $j++) {
			// Un arbre sur le bord de la forêt
			if ($i === 0 || ($i === ($hauteur - 1)) || ($j === 0) || ($j === ($largeur - 1))) { $visible++; continue; }
			
			// Vérification des arbres en intérieur
			$visibleDir = array("top" => false, "bottom" => false, "left" => false, "right" => false);
			$current = $forest[$i][$j];
			
			// Colonne
			$col = array_column($forest, $j);
			
			$haut = array_slice($col, 0, $i + 1);
			$visibleDir["top"] = count(array_filter($haut, function($v) use ($current) { return $v >= $current; })) > 1 ? false : true;
			
			$bas = array_slice($col, $i);
			$visibleDir["bottom"] = count(array_filter($bas, function($v) use ($current) { return $v >= $current; })) > 1 ? false : true;
			
			// Ligne
			$ligne = $forest[$i];
			$gauche = array_slice($ligne, 0, $j + 1);
			$visibleDir["left"] = count(array_filter($gauche, function($v) use ($current) { return $v >= $current; })) > 1 ? false : true;
			
			$droite = array_slice($ligne, $j);
			$visibleDir["right"] = count(array_filter($droite, function($v) use ($current) { return $v >= $current; })) > 1 ? false : true;
			
			if (in_array(true, $visibleDir)) { $visible++; }
		}		
	}
	
  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

	//if ($i === 0 || ($i === ($hauteur - 1)) || ($j === 0) || ($j === ($largeur - 1))) { $visible++; }
  fclose($file);
}
?>

<hr>

<pre><?= print_r($forest, true) ?></pre>
<p>Arbres visibles : <?= $visible ?></p>
