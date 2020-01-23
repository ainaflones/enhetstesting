<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kundeadministrasjon</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
        <div class='container'>
            <h2>Kundeadministrasjon</h2>
            <?php
               include_once 'KundeLogikk.php';
               include_once 'KundeModell.php';

               // hent alle kunder og vis disse
               $kundeLogikk = new KundeLogikk();
               $alleKunder = $kundeLogikk->hentAlleKunder();
               echo "<table class='table table-bordered'><tr><th>ID</th><th>Fornavn</th><th>Etternavn</th><th>Adresse</th>"
                  . "<th>Telefonnr</th><th>E-post</th><th></th><th></th></tr>";
               foreach ($alleKunder as $kunde)
               {
                   echo "<tr><td>$kunde->ID</td><td>$kunde->Fornavn</td><td>$kunde->Etternavn</td>"
                      . "<td>$kunde->Adresse</td><td>$kunde->Telefonnr</td><td>$kunde->Epost</td>"
                      . "<td><a href='EndreKunde.php?endreId=$kunde->ID' class='btn btn-primary'>Endre</a></td>"
                      . "<td><a href='SlettKunde.php?slettId=$kunde->ID' class='btn btn-danger'>Slett</a></td></tr>";
               }
               echo "</table>";
            ?>
            <a class='btn btn-success' href="RegistrerKunde.php">Registrer ny kunde</a>
        </div>
    </body>
</html>
