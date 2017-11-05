<?php
class Artikel extends Objekt
{
	/*Artikel erbt die Attribute name und nummer von 
	von Objekt. Hier ist name der Artikelname und nummer
	die Artikelnummer */
	
	//Preis des Artikels
	private $preis;
	
	//Konstruktor
	public function __construct()
	{
		$this->name="";
		$this->nummer="";
		$this->preis="";
	}
	
	public function set_preis($preis)
	{
		$this->preis = $preis;
	}
	
	public function get_preis()
	{
		return $this->preis;	
	}
	
	//Ausgabe aller Daten eines Artikels
	public function __toString()
	{
		$ausgabe="";
		if(strcmp($this->name,"") !=0)
			$ausgabe = $ausgabe . "Name: " .$this->name; 
		if(strcmp($this->nummer,"") !=0)
			$ausgabe = $ausgabe . " Artikelnummer: ". $this->nummer; 
		if(strcmp($this->preis,"") !=0)
			$ausgabe = $ausgabe . " Preis: ". $this->preis; 
		return $ausgabe;
	}	
		
	//Ausgabe alles Daten eines Artikels in einer html-Tabelle
	public function print_html()
	{
		$ausgabe="<tr> <td>$this->name</td> <td>$this->nummer</td> <td>$this->preis</td></tr>";
		return $ausgabe;
	}
		
}
?>
