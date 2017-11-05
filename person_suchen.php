<?php
	
	//Einfuegen der Dateien person.php und objekt.php, die die Klassen Person und Objekt enthalten
	include 'objekt.php';
	include 'person.php';
	
	//Datenbankverbindung zur Datenbank Bestellungen herstellen
	$conn = new mysqli("localhost","root","","Bestellungen");
	if($conn === false)
		echo("Keine Verbindung zur Datenbank" . $conn->error);
	
	//Daten einer Person aus der Datei person_suchen.html werden gespeichert
	$vorname = $_POST['vorname'];
	$nachname = $_POST['nachname'];
	$strasse = $_POST['strasse'];
	$wohnort = $_POST['wohnort'];
	
	
	/* Wenn Vorname, Nachname, Strasse und Wohnort bekannt sind, werden alle Personen aus der Datenbank gesucht, auf
	die diese Daten zutreffen */
	if(strcmp($vorname,"") !=0 && strcmp($nachname,"") !=0 && strcmp($strasse,"") !=0 && strcmp($wohnort,"") !=0 )
	{
		$suche = "SELECT vorname,nachname,strasse,wohnort,kundennummer from personen_db where vorname LIKE '$vorname' and nachname LIKE '$nachname'
			and strasse LIKE '$strasse' and wohnort LIKE '$wohnort'";
	}	
	
	/* Wenn die Strasse bekannt ist, werden alle Personen gesucht, die in dieser Strasse wohnen */
	elseif(strcmp($strasse,"") != 0)
	{
		$suche = "SELECT vorname,nachname,strasse,wohnort,kundennummer from personen_db where strasse LIKE '$strasse'";
	}
	
	/*Wenn der Wohnort bekannt ist, werden alle Personen gesucht, die in diesem Wohnort wohnen */
	elseif(strcmp($wohnort,"") != 0)
	{
		$suche = "SELECT vorname,nachname,strasse,wohnort,kundennummer from personen_db where wohnort LIKE '$wohnort'";	
	}
	
	/*Wenn Vorname und Nachname einer Person bekannt sind, werden alle Personen aus der Datenbank Personen gesucht, die
	den gesuchten Vornamen und den gesuchten Nachnamen haben */ 
	elseif(strcmp($vorname,"") !=0  && strcmp($nachname,"") !=0 )
	{
		$suche = "SELECT vorname,nachname,strasse,wohnort,kundennummer from personen_db where vorname LIKE '$vorname' and nachname LIKE '$nachname'";
	}
	
	/*Wenn der Vorname einer Person bekannt ist und der Nachname dieser Person unbekannt ist, werden alle Personen in der Datenbank Personen 
	gesucht, welche diesen Vornamen haben */
	elseif(strcmp($vorname,"") !=0  && strcmp($nachname,"") ==0 )
	{
		$suche = "SELECT vorname,nachname,strasse,wohnort,kundennummer from personen_db where vorname LIKE '$vorname'";
	}
	
	/*Wenn der Nachname einer Person bekannt ist und der Vorname dieser Person unbekannt ist, werden alle Personen in der Datenbank Personen
	gesucht, welche diesen Nachnamen haben */
	elseif(strcmp($vorname,"") ==0  && strcmp($nachname,"") !=0 )
	{
		$suche = "SELECT vorname,nachname,strasse,wohnort,kundennummer from personen_db where nachname LIKE '$nachname'";
	}
	//Treffen die obigen Faelle nicht ein, so werden alle Personen dieser Datenbank ausgegeben
	else
	{
		$suche = "SELECT vorname,nachname,strasse,wohnort,kundennummer from personen_db";
	}
	
	//Suche wird durchgefuehrt
	$result = $conn->query($suche); 
		
	//Daten der gefundenen Personen werden ausgegeben 
	echo("<table>");
	echo("<tr> <th> Vorname </th> <th> Nachname </th> <th> Strasse </th> <th> Wohnort </th> <th> Kundennummer </th> </tr>");
	while(list($vorn,$nachn,$str,$wohn,$knr) = $result->fetch_row())
	{
		$person = new Person();
		$person->set_vorname($vorn);
		$person->set_name($nachn);
		$person->set_strasse($str);
		$person->set_wohnort($wohn);
		$person->set_nummer($knr);
		
		echo($person->print_html()); 
	}
	echo("</table>");
	
	
?>
	
