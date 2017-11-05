<?php
	


class Person extends Objekt
{
	//Person erbt name und nummer von Objekt.
	/*nummer ist hier die Kundennummer und name ist hier
	der Nachname einer Person */
	//Vorname einer Person
	private $vorname;
	//Strasse, in der die Person wohnt
	private $strasse;
	//Wohnort der Person
	private $wohnort;
	
	//Konstruktor
	public function __construct()
	{
		$this->vorname="";
		$this->name="";
		$this->strasse="";
		$this->wohnort="";
	}
		

	public function set_vorname($vorname)
	{
		$this->vorname=$vorname;
	}
			
		
		
	public function set_strasse($strasse)
	{
		$this->strasse=$strasse;
	}
		
	public function set_wohnort($wohnort)
	{
		$this->wohnort=$wohnort;
	}
		
	public function get_vorname()
	{
		return $this->vorname;
	}	
		
		
	public function get_strasse()
	{
		return $this->strasse;
	}	
		
	public function get_wohnort()
	{
		return $this->wohnort;
	}	
		
	//Funktion, welche die Daten der Person ausgibt
	public function __toString()
	{
		$ausgabe="";
		if(strcmp($this->vorname,"") !=0)
			$ausgabe = $ausgabe . $this->vorname; 
		if(strcmp($this->name,"") !=0)
			$ausgabe = $ausgabe . " ". $this->name; 
		if(strcmp($this->strasse,"") !=0)
			$ausgabe = $ausgabe . " Strasse: ". $this->strasse; 
		if(strcmp($this->wohnort,"") !=0)
			$ausgabe = $ausgabe . " Wohnort: ". $this->wohnort; 
		if(strcmp($this->nummer,"") != 0)
			$ausgabe = $ausgabe . " Kundennummer: " . $this->nummer;
		return $ausgabe;
	}	
	
	//Daten einer Person wird in eine html-Tabelle geschrieben
	public function print_html()
	{
		$ausgabe="<tr> <td>$this->vorname</td> <td>$this->name</td> <td>$this->strasse</td> <td>$this->wohnort</td> <td>$this->nummer</td></tr>";
		return $ausgabe;
	}
			
}
	

?>
