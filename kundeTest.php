<?php
include_once '../KundeModell.php';
include_once '../DatabaseStub.php';
include_once '../KundeLogikk.php';


use PHPUnit\Framework\TestCase;

class kundeTest extends TestCase
{    

    //NB : Funksjonsnavnene under må starte med "test" !
    function test_hentAlleKunder()
    {   
        // arrange
        $kundeLogikk=new KundeLogikk(new DBStub());
        // act
        $kunder= $kundeLogikk->hentAlleKunder();
        // assert
        $this->assertEquals("Per",$kunder[0]->fornavn); 
        $this->assertEquals("Olsen",$kunder[0]->etternavn); 
        $this->assertEquals("Osloveien 82 0270 Oslo",$kunder[0]->adresse); 
        $this->assertEquals("12345678",$kunder[0]->telefonnr); 
        $this->assertEquals("per.olsen@online.no",$kunder[0]->epost); 
        $this->assertEquals("Line",$kunder[1]->fornavn); 
        $this->assertEquals("Jensen",$kunder[1]->etternavn); 
        $this->assertEquals("Askerveien 100, 1379 Asker",$kunder[1]->adresse); 
        $this->assertEquals("92876789",$kunder[1]->telefonnr); 
        $this->assertEquals("line.jensen@online.no",$kunder[1]->epost); 
        $this->assertEquals("Ole",$kunder[2]->fornavn); 
        $this->assertEquals("Olsen",$kunder[2]->etternavn); 
        $this->assertEquals("Bærumsveien 23, 1234 Bærum",$kunder[2]->adresse); 
        $this->assertEquals("99889988",$kunder[2]->telefonnr); 
        $this->assertEquals("ole.olsen@online.no",$kunder[2]->epost); 
    }
    
    function test_registerKunde_OK()
    {
        // arrange
        $kundeLogikk=new KundeLogikk(new DBStub());
        $kunde = new kunde();
        $kunde->ID = 1;
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Olsen";
        $kunde->adresse = "Osloveien 82 0270 Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "per.olsen@online.no";
        // act
        $OK= $kundeLogikk->registerKunde($kunde);
        // assert
        $this->assertEquals("OK",$OK); 
    }
    
    function test_registerKunde_DB_Feil()
    {
        // arrange
        $kundeLogikk=new KundeLogikk(new DBStub());
        $kunde = new kunde();
        $kunde->ID = -1;
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Olsen";
        $kunde->adresse = "Osloveien 82 0270 Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "per.olsen@online.no";
        // act
        $OK= $kundeLogikk->registerKunde($kunde);
        // assert
        $this->assertEquals("Feil",$OK); 
    }
    
    function test_registerKunde_RegEx_Feil_Fornavn()
    {
        // arrange
        $kundeLogikk=new KundeLogikk(new DBStub());
        $kunde = new kunde();
        $kunde->ID = -1;
        $kunde->fornavn = "Per*"; // merk * i fornavnet.
        $kunde->etternavn ="Olsen";
        $kunde->adresse = "Osloveien 82 0270 Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "per.olsen@online.no";
        // act
        $OK= $kundeLogikk->registerKunde($kunde);
        // assert
        $this->assertEquals("Feil",$OK); 
    }
    
    function test_hentEnKunde_OK()
    {
        // arrange
        $kundeLogikk = new KundeLogikk(new DBStub());
        $id= 1;
        // act
        $kunde = $kundeLogikk->hentEnKunde($id);
       // assert
        $this->assertEquals("Per",$kunde->fornavn); 
        $this->assertEquals("Olsen",$kunde->etternavn); 
        $this->assertEquals("Osloveien 82 0270 Oslo",$kunde->adresse); 
        $this->assertEquals("12345678",$kunde->telefonnr); 
        $this->assertEquals("per.olsen@online.no",$kunde->epost); 
    }
    
    function test_hentEnKunde_Feil()
    {
        // arrange
        $kundeLogikk = new KundeLogikk(new DBStub());
        $id= -1;
        // act
        $kunde = $kundeLogikk->hentEnKunde($id);
       // assert
        $this->assertEquals("Feil",$kunde); 
    }
    
    function test_endreKunde_OK()
    {
       // arrange
        $kundeLogikk = new KundeLogikk(new DBStub());
        $kunde = new kunde();
        $kunde->ID = 1;
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Olsen";
        $kunde->adresse = "Osloveien 82 0270 Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "per.olsen@online.no";
        // act
        $OK = $kundeLogikk->endreKunde($kunde);
       // assert
        $this->assertEquals("OK",$OK); 
    }
    
    function test_endreKunde_Feil()
    {
        // arrange
        $kundeLogikk = new KundeLogikk(new DBStub());
        $kunde = new kunde();
        $kunde->ID = -1;
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Olsen";
        $kunde->adresse = "Osloveien 82 0270 Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "per.olsen@online.no";
        // act
        $OK = $kundeLogikk->endreKunde($kunde);
       // assert
        $this->assertEquals("Feil",$OK); 
    }
    
    function test_slettKunde_OK()
    {
        // arrange
        $kundeLogikk = new KundeLogikk(new DBStub());
        $id= 1;
        // act
        $OK = $kundeLogikk->slettKunde($id);
       // assert
        $this->assertEquals("OK",$OK); 
    }
    
    function test_slettKunde_Feil()
    {
        // arrange
        $kundeLogikk = new KundeLogikk(new DBStub());
        $id= -1;
        // act
        $OK = $kundeLogikk->slettKunde($id);
       // assert
        $this->assertEquals("Feil",$OK); 
    }
}

