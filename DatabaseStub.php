<?php
include_once 'KundeModell.php';
class DBStub
{
    function hentAlleKunder()
    {
       $alleKunder = array();
       $kunde1 = new kunde();
       $kunde1->fornavn ="Per";
       $kunde1->etternavn = "Olsen";
       $kunde1->adresse = "Osloveien 82 0270 Oslo";
       $kunde1->telefonnr="12345678";
       $kunde1->epost ="per.olsen@online.no";
       $alleKunder[]=$kunde1;
       $kunde2 = new kunde();
       $kunde2->fornavn ="Line";
       $kunde2->etternavn = "Jensen";
       $kunde2->adresse = "Askerveien 100, 1379 Asker";
       $kunde2->telefonnr="92876789";
       $kunde2->epost ="line.jensen@online.no";
       $alleKunder[]=$kunde2;
       $kunde3 = new kunde();
       $kunde3->fornavn ="Ole";
       $kunde3->etternavn = "Olsen";
       $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
       $kunde3->telefonnr="99889988";
       $kunde3->epost ="ole.olsen@online.no";
       $alleKunder[]=$kunde3;
       return $alleKunder;
    }
    
    function registerKunde($kunde)
    {
        if($kunde->ID==1)
        {
            return "OK";
        }
        return "Feil";
    }
    
    function hentEnKunde($id)
    {
        if($id==-1)
        {
           return "Feil"; 
        }
        $kunde = new kunde();
        $kunde->fornavn ="Per";
        $kunde->etternavn = "Olsen";
        $kunde->adresse = "Osloveien 82 0270 Oslo";
        $kunde->telefonnr="12345678";
        $kunde->epost ="per.olsen@online.no";
        return $kunde;
    }
    
    function endreKunde($kunde)
    {
        if($kunde->ID==-1)
        {
           return "Feil"; 
        }
        return "OK";
    }
    
    function slettKunde($id)
    {
        if($id==-1)
        {
           return "Feil"; 
        }
        return "OK";
    }
}