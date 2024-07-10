<!-- Edit.php -->
<html>     
    <head>
    <link rel="stylesheet" href="stil.css">  
    <title> Zadatak 2 </title>
    </head>                
    <body class="b1">
        <center>
    <form action="ljekarnaGO.php" method="get">
       <label> Naziv lijeka </label> <input type="text" name="naziv" value="<?php echo $Lijek->naziv; ?>"/> <br/>
       <label>Opis lijeka </label><input type="text" name="opis" value="<?php echo $Lijek->opis; ?>"/><br/>
       <label>Cijena </label><input type="text" name="cijena" value="<?php echo $Lijek->cijena; ?>"/><br/>
        <br>
        <input type="hidden" name="id" value="<?php echo $Lijek->id; ?>"/>
        <input type="hidden" name="action" value="EditG" />
        <input type="submit" value="Uredi lijek" />
    </form>  </center>
</body>
</html>
