<h1>Advent Of Code - Day 6, Part 2</h1>
<h2><code>@Mar-Nb</code></h2>
<hr>

<?php
$file = fopen("input.txt", "r");

if ($file) {
  $marker = array();
  $nbChar = 0;

  while (count($marker) !== 14) {
    $letter = fgetc($file);

    if (in_array($letter, $marker)) {
      $i = array_search($letter, $marker);
      array_splice($marker, 0, ($i + 1));
    }
  
    $marker[] = $letter;
    $nbChar++;
  }

  echo "<pre>" . print_r($marker, true) . "</pre>";

  fclose($file);
}
?>

<hr>
<p>Nombre de lettre avant le premier marker :<b><u><?= $nbChar ?></u></b></p>