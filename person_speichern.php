<?php
	// Datei person.php und objekt.php, welche die Klassen Objekt und Person beinhalten, werden hinzugefuegt
	include 'objekt.php';
	include 'person.php';
	//neue Person wird angelegt
	$person = new Person();
	
	//Personendaten aus der Datei person_speichern.html werden eingelesen
	$person->set_vorname($_POST['vorname']);
	$person->set_name($_POST['nachname']);
	$person->set_strasse($_POST['strasse']);
	$person->set_wohnort($_POST['wohnort']);
	$person->set_nummer($_POST['kundennummer']);
	
	//Datenbankverbindung wird hergestellt
	$conn = new mysqli("localhost","root","","Bestellungen");
	if($conn === false)
		echo("Keine Verbindung zu mysql");
	
	
	
	
	$vorname = $person->get_vorname();
	$nachname = $person->get_name();
	$strasse = $person->get_strasse();
	$wohnort = $person->get_wohnort();
	$kundennummer = $person->get_nummer();

	//Daten der Person person werden in die Tabelle personen_daten geschrieben
	$insert = "INSERT INTO personen_db(vorname,nachname,strasse,wohnort,kundennummer)
		values('$vorname','$nachname','$strasse','$wohnort','$kundennummer')";

	if($conn->query($insert) === false)
		echo("Person konnte nicht gespeichert werden" . $conn->error);
	
	//Nachdem die Person in der Tabelle personen_db gespeichert worden ist, wird die Datei main.html aufgerufen
	header('Location: main.html'); exit;
	
?>
