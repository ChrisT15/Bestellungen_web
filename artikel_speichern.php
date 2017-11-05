<?php
	/* die Dateien objekt.php und artikel.php, welche die Klassen Objekt und Artikel
	beinhalten werden, eingefuegt */
	include 'objekt.php';
	include 'artikel.php';
	//neuer Artikel wird angelegt
	$artikel = new Artikel();
	
	//Artikeldaten aus der Datei artikel_speichern.html werden eingelesen
	$artikel->set_name($_POST['name']);
	$artikel->set_nummer($_POST['artikelnummer']);
	$artikel->set_preis($_POST['preis']);
	
	
	//Datenbankverbindung wird hergestellt
	$conn = new mysqli("localhost","root","","Bestellungen");
	if($conn === false)
		echo("Keine Verbindung zu mysql");
	
	$name = $artikel->get_name();
	$nummer = $artikel->get_nummer();
	$preis = $artikel->get_preis();
	

	//Daten des Artikels artikel werden in die Tabelle artikel_db geschrieben
	$insert = "INSERT INTO artikel_db(name,nummer,preis)
		values('$name','$nummer','$preis')";

	if($conn->query($insert) === false)
		echo("Artikel konnte nicht gespeichert werden" . $conn->error);
	
	//Nachdem der Artikel in der Tabelle artikel_db gespeichert worden ist, wird die Datei main.html aufgerufen
	header('Location: main.html'); exit;
	
?>
