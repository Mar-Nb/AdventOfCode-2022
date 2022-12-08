<h1>Advent Of Code - Day 5, Part 1</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");
$nbLigne = 1; $stacks = array();

if ($file) {
  // Préparation des stacks (Style LIFO)
  while (($line = fgets($file)) !== " 1   2   3   4   5   6   7   8   9 \n") {
    echo "<pre>" . $line . "</pre>";
    $cranes = str_split(trim($line), 4);
    
    // Initialisation du nombre de stack
    if ($nbLigne === 1) {
      for ($i = 0; $i < count($cranes); $i++) {
        $stacks[] = array();
        $stacks[$i][] = $cranes[$i];
      }
    } else {
      for ($i = 0; $i < count($cranes); $i++) { array_unshift($stacks[$i], $cranes[$i]); }
    }
    
    // Test
    $nbLigne++;
  }

  while (($line = fgets($file)) !== false) {
    $arrangement = explode(" ", trim($line));
    
    if ($arrangement[0] == "move") {
      $nbCrane = intval($arrangement[1]);
      $from = intval($arrangement[3]) - 1;
      $to = intval($arrangement[5]) - 1;

      while ($nbCrane !== 0) {
        $crane = array_pop($stacks[$from]);
        if (trim($crane) == "") { continue; }

        $stacks[$to][] = $crane;
        $nbCrane--;
      }
    }
  }

  echo "<pre>" . print_r($stacks, true) . "</pre>";

  if (!feof($file)) {
    echo "<b>Erreur</b>: <code>fgets()</code> FAIL\n";
  }

  fclose($file);
}
?>
