<div style="float: right">
    <?php echo $_SESSION['nastavnik']->username; ?>
    <a href="<?php echo site_url("Nastavnik/logout");?>">Izloguj se</a>
</div>
<h3>Nastavnik</h3>

<h4>Predmeti koji imaju aktivne prijave za projekat</h4>


<?php

    if(empty($aktivne_prijave)){
        echo "Nema aktivnih prijava";
    }
    else {
        echo "<table><tr><th>sifraPredmeta</th>"
                . "<th>Naziv</th>"
                . "<th>Zatvori prijavu</th></tr>";
        foreach ($aktivne_prijave as $prijava) {
            echo "<tr><td>".$prijava->sifraPredmeta."</td>"
                    . "<td>".$prijava->naziv."</td>"
                    . "<td><a href='".site_url("Nastavnik/zatvori_prijavu")."?id=".$prijava->idP."'>Zatvori prijavu</a></td></tr>";
        }
        echo "</table>";
    }        
            
?>