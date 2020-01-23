<?php
include_once 'KundeModell.php';
class DB
{
    private $db;
    function __construct()
    {
        $this->db=new mysqli("localhost","root","","Kunde");
        $this->db->set_charset("utf8");
    }
    
    function hentAlleKunder()
    {
        $sql = "Select * from kunde ";
        $resultat = $this->db->query($sql);
        $kunder = array();
        while($rad = $resultat->fetch_object())
        {
            $kunder[]=$rad;
        }
        return $kunder;
    }
    
    function registerKunde($kunde)
    {
        $sql = "Insert into kunde (Fornavn,Etternavn,Adresse,Telefonnr,Epost)";
        $sql .= "Values ('$kunde->fornavn','$kunde->etternavn','$kunde->adresse',";
        $sql .= "'$kunde->telefonnr','$kunde->epost')";
        $resultat = $this->db->query($sql);
        if($this->db->affected_rows==1)
        {
            return "OK";
        }
        else
        {
            return "Feil";
        }
    }
    
    function hentEnKunde($id)
    {
        $kunde = new kunde();
        $sql = "Select * from kunde Where ID = '$id'";
        $resultat = $this->db->query($sql);
        if($this->db->affected_rows!=1)
        {
            return "Feil";
        }
        $rad = $resultat->fetch_object();
        $kunde->fornavn = $rad->Fornavn;
        $kunde->etternavn = $rad->Etternavn;
        $kunde->adresse = $rad->Adresse;
        $kunde->telefonnr = $rad->Telefonnr;
        $kunde->epost = $rad->Epost;
        return $kunde;
    }
    
    function endreKunde($kunde)
    {
        $sql =  "Update kunde Set Fornavn = '$kunde->fornavn',";
        $sql .= " Etternavn = '$kunde->etternavn', Adresse = '$kunde->adresse',";
        $sql .= " Telefonnr = '$kunde->telefonnr', Epost ='$kunde->epost'";
        $sql .= " Where ID = '$kunde->ID'";
        $resultat = $this->db->query($sql);
        if($resultat!=null)
        {
            return "OK";
        }
        else
        {
            return "Feil";
        }
    }
    
    function slettKunde($id)
    {
        $sql = "Delete From kunde Where ID = '$id'";
        $resultat = $this->db->query($sql);
        if($this->db->affected_rows==1)
        {
            return "OK";
        }
        else
        {
            return "Feil";
        }
    }
}
