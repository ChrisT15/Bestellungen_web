<?php
	// Datei bestellung.php, welche die Klasse Person beinhaltet, wird hinzugefuegt
	include 'bestellung.php';
	//neue Bestellung wird angelegt
	$bestellung = new Bestellung();
	
	//Daten einer Bestellung aus der Datei bestellung_speichern.html wird eingelesen
	$bestellung->set_kundennummer($_POST['kundennummer']);
	$bestellung->set_artikelnummer($_POST['artikelnummer']);
	$bestellung->set_anzahl($_POST['anzahl']);
	
	
	//Datenbankverbindung wird hergestellt
	$conn = new mysqli("localhost","root","","Bestellungen");
	if($conn === false)
		echo("Keine Verbindung zu mysql");
	
	$knr = $bestellung->get_kundennummer();
	$anr = $bestellung->get_artikelnummer();
	$anzahl = $bestellung->get_anzahl();
	

	//Daten der Bestellung bestellung werden in die Tabelle bestellungen_db geschrieben
	$insert = "INSERT INTO bestellungen_db(kundennummer,artikelnummer,anzahl)
		values('$knr','$anr','$anzahl')";

	if($conn->query($insert) === false)
		echo("Bestellung konnte nicht gespeichert werden" . $conn->error);
	
	//Nachdem die Bestellung in der Tabelle bestellungen_db gespeichert worden ist, wird die Datei main.html aufgerufen
	header('Location: main.html'); exit;
	
?>
