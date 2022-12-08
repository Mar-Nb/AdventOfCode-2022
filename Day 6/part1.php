<h1>Advent Of Code - Day 6, Part 1</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");

if ($file) {
  $marker = array();
  $nbChar = 0;

  while (count($marker) !== 4) {
    $letter = fgetc($file);
    echo "<p>" . $letter . "</p>";

    if (in_array($letter, $marker)) { $marker = array(); }
    
    $marker[] = $letter;
    $nbChar++;
  }

  echo "<pre>" . print_r($marker, true) . "</pre>";

  fclose($file);
}
?>

<hr>
<p>Nombre de lettre avant le premier marker :<b><u><?= $nbChar ?></u></b></p>