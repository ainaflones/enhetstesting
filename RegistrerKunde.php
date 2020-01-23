<?php
ob_start();
include_once 'KundeModell.php';
include_once 'KundeLogikk.php';
?>
<link rel="stylesheet" href="bootstrap.min.css">
<div class='container'>
   <h2>Registrer ny kunde</h2>
    <!-- Merk mangler klientvalidering i JavaScript -->
    <form action="" method="post">
        <table>
            <tr>
                <td>Fornavn</td>
                <td><input type="text" name="Fornavn"/></td>
            </tr>
            <tr>
                <td>Etternavn</td>
                <td><input type="text" name="Etternavn"/></td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td><input type="text" name="Adresse"/></td>
            </tr>
            <tr>
                <td>Telefonnr</td>
                <td><input type="text" name="Telefonnr"/></td>
            </tr>
            <tr>
                <td>E-post</td>
                <td><input type="text" name="Epost"/></td>
            </tr>
        </table>
        <input type="submit" name="registrer" value="Register kunde" class="btn btn-success"/>
    </form> 
</div>

<?php
if(isset($_POST["registrer"]))
{
    $kunde = new kunde();
    $kunde->fornavn = $_POST["Fornavn"];
    $kunde->etternavn = $_POST["Etternavn"];
    $kunde->adresse = $_POST["Adresse"];
    $kunde->telefonnr = $_POST["Telefonnr"];
    $kunde->epost = $_POST["Epost"];
    
    $kundeLogikk = new KundeLogikk();
    $ok= $kundeLogikk->registerKunde($kunde);
    if($ok=="OK")
    {
        header("location:index.php");
        ob_flush();
    }
    else
    {
        echo "Feil i registrering!";
    }
}

