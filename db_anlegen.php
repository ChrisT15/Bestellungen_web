<?php
	
	//Datenbankverbindung wird hergestellt
	$conn = new mysqli("localhost","root","");
	if($conn === false)
		echo("Keine Verbindung zu mysql");
	
	//Falls die Datenbank Bestellungen noch nicht existiert, wird diese angelegt
	$new_database = "CREATE DATABASE IF NOT EXISTS Bestellungen";
	if($conn->query($new_database) === false)
		echo("Datenbank konnte nicht erstellt werden" . $conn->error);
	
	//Wenn die Tabelle artikel_db noch nicht erstellt wurde, wird dies nun getan
	$table = "CREATE TABLE IF NOT EXISTS artikel_db (
		nr INT AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(30),
		nummer VARCHAR(30),
		preis FLOAT) ";
	//Datenbank Bestellungen wird ausgewaehlt
	$conn->query("use Bestellungen");
	if($conn->query($table) === false)
		echo("Tabelle artikel_db konnte nicht erstellt werden" .  $conn->error);
	
	
	//Wenn die Tabelle personen_db noch nicht erstellt wurde, wird dies nun getan
	$table = "CREATE TABLE IF NOT EXISTS personen_db (
		nr INT AUTO_INCREMENT PRIMARY KEY,
		vorname VARCHAR(30),
		nachname VARCHAR(30),
		strasse VARCHAR(30),
		wohnort VARCHAR(30),
		kundennummer VARCHAR(30)) ";
	if($conn->query($table) === false)
		echo("Tabelle personen_db konnte nicht erstellt werden" .  $conn->error);
	
	//Wenn die Tabelle bestellungen_db noch nicht erstellt wurde, wird dies nun getan
	$table = "CREATE TABLE IF NOT EXISTS bestellungen_db (
		nr INT AUTO_INCREMENT PRIMARY KEY,
		kundennummer VARCHAR(30),
		artikelnummer VARCHAR(30),
		anzahl FlOAT) ";
	
	if($conn->query($table) === false)
		echo("Tabelle bestellungen_db konnte nicht erstellt werden" .  $conn->error);
	
	//header('Location: main.html'); exit;
	
?>
