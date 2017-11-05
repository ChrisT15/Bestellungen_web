<?php
	
	//Einfuegen der Dateien objekt.php und artikel.php, welche die Klassen Objekte und Artikel beinhalten
	include 'objekt.php';
	include 'artikel.php';

	//Datenbankverbindung zur Datenbank Personen herstellen
	$conn = new mysqli("localhost","root","","Bestellungen");
	if($conn === false)
		echo("Keine Verbindung zur Datenbank" . $conn->error);
	
	//Name eines Artikels wird aus der Datei artikel_suchen.html gespeichert
	$name = $_POST['name'];
	
	
	/* Wenn Name des Artikels bekannt ist, werden alle Artikel gesucht, die diesen Namen haben */
	if(strcmp($name,"") !=0)
	{
		$suche = "SELECT name,nummer,preis from artikel_db where name LIKE '$name'";
	}	
	
	else
	{
		$suche = "SELECT name,nummer,preis from artikel_db";
	}
	
	//Suche wird durchgefuehrt
	$result = $conn->query($suche); 
		
	//Daten der gefundenen Artikel werden ausgegeben 
	echo("<table>");
	echo("<tr> <th> Artikelname </th> <th> Artikelnummer </th> <th> Preis </th> </tr>");
	while(list($name,$nummer,$preis) = $result->fetch_row())
	{
		$artikel = new artikel();
		$artikel->set_name($name);
		$artikel->set_nummer($nummer);
		$artikel->set_preis($preis);
		
		
		echo($artikel->print_html()); 
	}
	echo("</table>");
	
	
?>
	
