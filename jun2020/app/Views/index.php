<DOCTYPE html>
<html>
  <head>
      <title>Dogadjaji 2020</title>
  </head>
  <body>

<form name="pretraga" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="controller" value="Dogadjaji"/>
    <input type="hidden" name="akcija" value="pretraga"/>
    <table>
        <tr>
            <td>Naziv:</td>
            <td><input type="text" name="naslov"
                       value="<?php echo $uneti_naziv??""; ?>"/></td>
        </tr>
        <tr>
            <td>Grad:</td>
            <td>
                <select name="grad">
                    <option value=''>Izaberite grad</option>
                <?php
                if(!empty($gradovi)){
                foreach ($gradovi as $grad){
                    echo "<option value='{$grad->ime_grada}' ";
                    if(!empty($uneti_grad) && $grad->ime_grada==$uneti_grad)
                        echo "selected";
                    echo ">{$grad->ime_grada}</option>";
                }
                }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Kategorija:</td>
            <td>
                <?php
                if(!empty($kategorije)){
                foreach ($kategorije as $kategorija){
                    echo "<input type='radio' name='kategorija' value='{$kategorija->naziv}'";
                    if(!empty($uneta_kategorija) && $kategorija->naziv==$uneta_kategorija)
                        echo "checked";
                    echo "/>{$kategorija->naziv}<br/>";
                }
                }
                ?>
            </td>
        </tr>
        <tr> 
            <td>Da li je otkazan?</td>
            <td>
                <input type='checkbox' name='otkazan' value='da'
                    <?php
                         if(!empty($uneto_otkazivanje))echo "checked";
                    ?>/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="Trazi" value="Trazi"/>
            </td>
            <td>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <button>Ponisti</button>
                </a>
            </td>
        </tr>
    </table>
</form>
<br>
<?php
if(!empty($poruka)){
    echo $poruka;
}
else if(!empty($dogadjaji)){
    echo "<h3>Rezultati pretrage:</h3>";
    foreach ($dogadjaji as $dogadjaj){
        if($dogadjaj->je_otkazan==1 && empty($uneto_otkazivanje))
            echo "<span style='color:red'>";
        echo $dogadjaj->naziv." ";
        echo "<a href='{$_SERVER['PHP_SELF']}?controller=Dogadjaji&akcija=prikaz"
            ."&id={$dogadjaj->id_dog}'>Detalji</a>";
        if($dogadjaj->je_otkazan==1 && empty($uneto_otkazivanje))
            echo "</span>";
        echo "<br/>";
    }
}

?>

    <footer align="center">
      Copyright &#169; ETF SI3PSI, 2020
    </footer>
  <body>
<html>
