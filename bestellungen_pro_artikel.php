<?php
	

	//Datenbankverbindung zur Datenbank Bestellungen herstellen
	$conn = new mysqli("localhost","root","","Bestellungen");
	if($conn === false)
		echo("Keine Verbindung zur Datenbank" . $conn->error);
	
	//Name eines Artikels wird aus der Datei bestellungen_pro_artikel.html gespeichert
	$anr = $_POST['artikelnummer'];
	
	
	/* Wenn Name des Artikels bekannt ist, werden alle Bestellungen aufgelistet, in denen dieser Artikel bestellt wurde.
	Pro Bestellung werden der Name der Person, die bestellt hat, die Anzahl, wie oft der Artikel bestellt wurde, und der
	Gesamtpreis dieser Bestellung aufgefuehrt. Am Schluss wird die Geldsumme alle Bestellungen ausgegeben */
	if(strcmp($anr,"") !=0)
	{
		//Geldsumme aller Bestellungen
		$summe=0;
		//Preis des Artikels wird gesucht
		$suche_preis = "select preis from artikel_db where nummer = '$anr'";
		$preis_res = $conn->query($suche_preis);
		$row = $preis_res->fetch_row();
		$preis = $row[0];

		/*Alle Bestellungen, in denen der Artikel bestellt wurde, werden gesucht. Hierbei wird pro Bestellung der Name
		der Person, die bestellt hat, die Anzahl, wie oft der Artikel bestellt wurde, aufgelistet */
		$bp = "select personen_db.nachname, personen_db.vorname, bestellungen_db.anzahl from personen_db left outer join bestellungen_db on 			  			personen_db.kundennummer = bestellungen_db.kundennummer where bestellungen_db.artikelnummer like '$anr'";
		$result = $conn->query($bp);
		if($conn->query($bp) === false)
			echo("Error. Query" . $conn->error);
		
		/* pro Bestellung wird der Name der Person, die bestellt hat, die Anzahl, wie oft der Artikel bestellt wurde, und der
		Gesamtpreis aufgelistet */
		echo("<table>");
		echo("<tr> <th>Nachname</th> <th>Vorname</th> <th> Anzahl </th> <th> Gesamtpreis </th> </tr>");
		while(list($nachname,$vorname,$anzahl) = $result->fetch_row())
		{
			//Gesamtpreis pro Bestellung
			$gesamtpreis = $anzahl*$preis;
			$summe = $summe + $gesamtpreis;
			echo("<tr> <td>$nachname</td> <td>$vorname</td> <td>$anzahl</td> <td> $gesamtpreis</td></tr>");
		} 
		echo("</table>");
		echo("Summe: " . $summe);
		
	}	
	
	else
	{
		//falls keine Artikelnummer ausgegeben wurde
		echo("Es wurde keine Artikelnummer eingegeben");
	}
	
	
?>
