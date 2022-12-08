<h1>Advent Of Code - Day 7, Part 2</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$current = "";
$pwd = array(); $sizes = array();
$total = 0;

if ($file) {
  while (($line = fgets($file)) !== false) {
    $commandLine = explode(" ", trim($line));
    echo "<p>" . trim($line) . "</p>";

    if ($commandLine[0] == "$" && $commandLine[1] == "cd") {
      // Déplacement vers un dossier ou chez le parent

      if (ctype_alnum($commandLine[2]) || ($commandLine[2] == "/")) {
        // Le nom d'un dossier est donnée
	      $current = $commandLine[2];
        if (!array_key_exists($current, $sizes)) {
		      $pwd[] = $current;
        	$sizes[$current] = 0;
        } else if (array_key_exists($current, $sizes) && $sizes[$current] !== 0) {
        	// Voici le moment du "dirty code" !
        	$insert = false;
        	$i = 1;
        	while (! $insert) {
        		$dirtyName = implode("", [$current, "-", $i]);
        		if (!array_key_exists($dirtyName, $sizes)) {
        			$current = $dirtyName;
        			$pwd[] = $dirtyName;
        			$sizes[$dirtyName] = 0;
        			$insert = true;
        		}
        		else { $i++; }
        	}
        }
      } else if ($commandLine[2] == "..") {
        // On remonte dans l'arborescence
        array_pop($pwd);
      }
    } else {
      // Sortie d'un "ls"

      if (is_numeric($commandLine[0])) {
        // Taille d'un fichier, à récupérer
        echo "<pre>ADD $commandLine[0] $commandLine[1] : " . print_r($pwd) . "</pre>";
        foreach ($pwd as $key => $value) { $sizes[$value] += intval($commandLine[0]); }
        echo "<pre>" . print_r($sizes) . "</pre>";
      }
    }

    echo "<hr>";
  }

  foreach ($sizes as $key => $value) { $total += ($value <= 100000) ? $value : 0; }
  
  // Changement pour la partie 2
  $rootSize = $sizes["/"];
  rsort($sizes);
  $toDel = array_values(array_filter($sizes, function ($v, $k) use ($rootSize) { return (($rootSize - $v) <= 40000000 && ($rootSize - $v) > 0); }, ARRAY_FILTER_USE_BOTH));
  sort($toDel);

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>

<hr>
<pre>Total du dossier à supprimer : <?= $toDel[0] ?></pre>
