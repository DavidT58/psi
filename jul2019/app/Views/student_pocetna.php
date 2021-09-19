<div style="float: right">
    <?php echo $_SESSION['student']->username; ?>
    <a href="<?php echo site_url("Student/logout");?>">Izloguj se</a>
</div>
<h3>Student</h3>
<h4>Prijava za timski projekat</h4>

<?php 
 if(empty($niz_predmeta)){
        echo "Nema predmeta za koje mozete prijaviti timski projekat";
    }
    else {

?>
<form name="prijava" method="GET" action="<?php echo site_url("Student/prijava_predmet");?>">
    
    Predmeti za koje mozete prijaviti tim:<select name="predmet">
        <?php
        foreach ($niz_predmeta as $predmet) {
            echo "<option value='".$predmet->sifraPredmet."'>".$predmet->naziv."</option>";     
        }
        ?>
    </select><br>
    <input type="submit" value="Prijavi"/>
</form>
<?php
    }
?>