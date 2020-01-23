<?php
ob_start();
include_once 'KundeModell.php';
include_once 'KundeLogikk.php';
$id=$_GET["endreId"];
$kundeLogikk = new KundeLogikk();
$kunde = $kundeLogikk->hentEnKunde($id);
?>
<link rel="stylesheet" href="bootstrap.min.css">
<div class="container">
    <h2>Endre kunde</h2>
    <form action="" method="post">
        <input name="ID" type="hidden" value="<?php echo $id ?>"/>
        <table>
            <tr>
                <td>Fornavn</td>
                <td><input type="text" name="Fornavn" value="<?php echo $kunde->fornavn ?>"/></td>
            </tr>
            <tr>
                <td>Etternavn</td>
                <td><input type="text" name="Etternavn" value="<?php echo $kunde->etternavn ?>"/></td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td><input type="text" name="Adresse" value="<?php echo $kunde->adresse ?>"/></td>
            </tr>
            <tr>
                <td>Telefonnr</td>
                <td><input type="text" name="Telefonnr" value="<?php echo $kunde->telefonnr ?>"/></td>
            </tr>
            <tr>
                <td>E-post</td>
                <td><input type="text" name="Epost" value="<?php echo $kunde->epost ?>"/></td>
            </tr>
        </table>
        <input type="submit" name="endre" value="Endre kunde" class="btn btn-success"/>
    </form>
</div>
<?php
if(isset($_POST["endre"]))
{
    $kunde = new kunde();
    $kunde->ID = $_POST["ID"];
    $kunde->fornavn = $_POST["Fornavn"];
    $kunde->etternavn = $_POST["Etternavn"];
    $kunde->adresse = $_POST["Adresse"];
    $kunde->telefonnr = $_POST["Telefonnr"];
    $kunde->epost = $_POST["Epost"];
    
    $kundeLogikk = new KundeLogikk();
    $ok= $kundeLogikk->endreKunde($kunde);
    if($ok=="OK")
    {
        header("location:index.php");
        ob_flush();
    }
    else
    {
        echo "Feil i endring!";
    }
}
