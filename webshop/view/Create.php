<!-- create.php -->
<html>
    <head>
    <link rel="stylesheet" href="stil.css">
    <title> Zadatak 2 </title>
    </head>
    <body class="b1">
        <center>
        <form action="ljekarnaGO.php" method="get">
          <label>  Naziv lijeka </label><input type="text" name="naziv" value="" /> <br/>
          <label> Opis </label><input type="text" name="opis" value="" /> <br/>
          <label> Cijena </label><input type="text" name="cijena" value="" /> <br/>
            <br>
            <input type="hidden" name="action" value="CreateG" />
            <input type="submit" value="Unesi u bazu" />
        </form> </center>
    </body>
</html>
