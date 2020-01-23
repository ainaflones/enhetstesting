<?php
ob_start();
include_once 'KundeModell.php';
include_once 'KundeLogikk.php';
$id=$_GET["slettId"];
$kundeLogikk = new kundeLogikk();
$ok = $kundeLogikk->slettKunde($id);
if($ok=="OK")
{
    header("location:index.php");
}
else
{
    echo "Feil i sletting!";
}


