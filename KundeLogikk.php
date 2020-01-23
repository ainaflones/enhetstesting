<?php
include_once 'Database.php';

class KundeLogikk
{
    private $db;
    function __construct($innDb=null)
    {
        if($innDb==null)
        {
            $this->db=new DB(); 
        }
        else
        {
            $this->db=$innDb;
        }
    }
    
    function hentAlleKunder()
    {
        $kunder = $this->db->hentAlleKunder();
        return $kunder;    
    }
    
    function registerKunde($kunde)
    {
        // Dette er bare et eksempel. Burde vært implementert konsekvent over alt!
        if(!preg_match("/^[a-zA-ZøæåÆØÅ\-. ]{2,30}$/",$kunde->fornavn)) 
        {
            return "Feil";
        }
        $ok = $this->db->registerKunde($kunde);
        return $ok;
    }
    
    function hentEnKunde($id)
    {
        $kunde = $this->db->hentEnKunde($id);
        return $kunde;
    }
    
    function endreKunde($kunde)
    {
        $ok = $this->db->endreKunde($kunde);
        return $ok;
    }
    
    function slettKunde($id)
    {
        $ok = $this->db->slettKunde($id);
        return $ok;
    }
}