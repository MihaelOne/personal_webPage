<!-- Details.php -->
<html>  
    <head>
    <link rel="stylesheet" href="stil.css">  
    <title> Zadatak 2 </title>
    </head>                   
    <body class="b1">
        <center>
    <form action="ljekarnaGO.php" method="get">
         <p class="p1"> Naziv lijeka: <?php echo $Lijek->naziv ?> </p> <br/>
         <p class="p1"> Opis lijeka: <?php echo $Lijek->opis ?> </p> <br/>
         <p class="p1"> Cijena lijeka: <?php echo $Lijek->cijena ?> </p> <br/>
         <a class="p2" href='?action=delete&id=<?php echo $Lijek->id ?>'> Obriši lijek </a> <br/>
         <br></br>
         <a class="p2" href='?action=EditForma&id=<?php echo $Lijek->id ?>'> Izmijeni lijek </a>
</center>
    </form>
</body>
</html>
