<!--view/LijekView.php -->
<html>
  <head>
  <link rel="stylesheet" href="stil.css">
  <title> Zadatak 2 </title>
</head>
<center> 
    <body class="b1">
      <h1> POPIS LIJEKOVA </h1>
        <table class="position1">
        <tr>
              <th>ID</th>
              <th>Naziv lijeka</th>
              <th>Opis lijeka</th>
              <th>Cijena</th>
              <th>Obriši</th>
              <th>Izmjeni</th>
        </tr>
          <?php 
          foreach ($Lijekovi as $key =>$value) {
      ?>
          <tr>
          <td><?php echo $value->id; ?></td>
          <td><a href='?action=DetailsG&id=<?php echo $value->id; ?>'> <?php echo $value->naziv; ?> </a></td>
          <td> <?php echo $value->opis; ?> </td>
          <td> <?php echo $value->cijena; ?> </td>
          <td> <a href='?action=delete&id=<?php echo $value->id; ?>'> Obriši lijek </a> </td>
          <td> <a href='?action=EditForma&id=<?php echo $value->id; ?>'> Izmjeni lijek </a> </td>
          </tr>

        <?php
          }
        ?>
          </table>
          <br></br>
          <p class="p1"> Tražilica: </p>
        <form action="ljekarnaGO.php" method="get">
           <label> Naziv </label> <input type="text" name="naziv" value="" /> <br/>
           <label> Opis </label> <input type="text" name="opis" value="" /> <br/>
            <br/>
            <input type="hidden" name="action" value="SearchG" />
            <input type="submit" value="Traži" /> 
         </form>
        </br>
          <a class="link1" href='ljekarnaGO.php?action=CreateForma'> UNOS NOVOG LIJEKA </a>
          </center>
    </body>

</html>