<DOCTYPE html>
<html>
  <head>
      <title>Dogadjaji 2020</title>
  </head>
  <body>

<?php
echo "<h2>Naziv: {$naziv}</h2>";
echo "<h3>Grad: {$grad}</h3>";
echo "Mesto: {$mesto}<br/>";
echo "Datum: {$datum}<br/>";
echo "Vreme: {$vreme}<br/>";
echo "Broj trenutno zainteresovani: {$broj_zainteresovanih}</br>";
echo "Ocena: {$ocena}</br>";
echo "<br><a href='{$_SERVER['PHP_SELF']}?controller=Dogadjaji&akcija=index'>Nazad</a>";


?>

    <footer align="center">
      Copyright &#169; ETF SI3PSI, 2020
    </footer>
  <body>
<html>