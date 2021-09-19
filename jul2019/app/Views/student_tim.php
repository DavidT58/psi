<div style="float: right">
    <?php echo $_SESSION['student']->username; ?>
    <a href="<?php echo site_url("Student/logout");?>">Izloguj se</a>
</div>
<h3>Student</h3>
<hs>Izbor tima:</h4>


<?php
	if(isset($greska))
            echo $greska;
?>

<form method="POST" action="<?php echo site_url("Student/prijava_tim");?>" >
    <input type="hidden" name="predmet" value="<?php echo $predmet ?>"/>
    
    <input type="hidden" name="clan[0]" value="<?php echo $_SESSION['student']->username ?>"/>
 
    Drugi clan: 
    <select name="clan[1]">
        <option value=''>Izaberi clana</option>
    <?php
        foreach ($studenti as $student){
            if($clan[1]==$student->username)
                echo "<option value='".$student->username."' selected>".$student->ime." ".$student->prezime."</option>";
            else
                echo "<option value='".$student->username."'>".$student->ime." ".$student->prezime."</option>";
        }
    ?>
    </select>
    <br/>
    
    Treci clan: 
    <select name="clan[2]">
        <option value=''>Izaberi clana</option>
    <?php   
        foreach ($studenti as $student){
            if($clan[2]==$student->username)
                echo "<option value='".$student->username."' selected>".$student->ime." ".$student->prezime."</option>";
            else
                echo "<option value='".$student->username."'>".$student->ime." ".$student->prezime."</option>";
        }
    ?>
    </select>
    <br/>
        
    Cetvrti clan: 
    <select name="clan[3]">
        <option value=''>Izaberi clana</option>
    <?php      
        foreach ($studenti as $student){
            if($clan[3]==$student->username)
                echo "<option value='".$student->username."' selected>".$student->ime." ".$student->prezime."</option>";
            else
                echo "<option value='".$student->username."'>".$student->ime." ".$student->prezime."</option>";
        }
    ?>
    </select>
    <br/>
    
    <input type="submit" value="Napravi tim">
    <br>
</form>

</table>