<?php

class Bestellung
{
	/*eine Bestellung beinhaltet die Kundennummer der Person, die bestellt hat,
	die Artikelnummer des Artikels, der bestellt wurde, und die Anzahl, wie oft
	dieser Artikel bestellt wurde */
	private $kundennummer;
	private $artikelnummer;
	private $anzahl;
	
	//Konstruktor
	public function __construct()
	{
		$this->kundennummer="";
		$this->artikelnummer="";
		$this->anzahl="";
	}
	
	public function set_kundennummer($nummer)
	{
		$this->kundennummer = $nummer;
	}
	
	public function set_artikelnummer($nummer)
	{
		$this->artikelnummer=$nummer;
	}
	
	public function set_anzahl($anzahl)
	{
		$this->anzahl = $anzahl;
	}
	
	public function get_kundennummer()
	{
		return $this->kundennummer;
	}
	
	public function get_artikelnummer()
	{
		return $this->artikelnummer;
	}
	
	public function get_anzahl()
	{
		return $this->anzahl;
	}
	
	
}

?>
