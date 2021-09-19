<form name="loginform" action="<?php echo site_url("Gost/ulogujse");?>" method="post">
    <font color='red'><?php if(isset($poruka)) echo $poruka; ?></font> 
    <table>
    <tr>
        <td>Korisnicko ime:</td>
        <td><input type="text" name="username" value="<?php if(isset($username)) echo $username ?>"/></td>
        <td> <font color='red'><?php if(isset($porukausername)) echo $porukausername; ?></font></td>
    </tr>
    <tr>
        <td>Lozinka:</td>
        <td><input type="password" name="password"/></td>
        <td> <font color='red'><?php if(isset($porukapassword)) echo $porukapassword; ?></font></td>
    </tr>
    <tr>
        <td><input type="submit" value="Log in"/></td>
    </tr>
    </table>
</form>
