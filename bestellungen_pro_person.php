<?php
	
	//die Datei bestellung.php enthaelt die Klasse Bestellung
	include 'bestellung.php';

	//Datenbankverbindung zur Datenbank Bestellungen herstellen
	$conn = new mysqli("localhost","root","","Bestellungen");
	if($conn === false)
		echo("Keine Verbindung zur Datenbank" . $conn->error);
	
	//Name eines Artikels wird aus der Datei bestellungen_pro_person.html gespeichert
	$knr = $_POST['kundennummer'];
	
	
	/* Wenn die Kundennummer bekannt ist, werden alle Bestellungen, die diese Person durchgefuehrt hat, aufgelistet. Pro Bestellung werden
	der Name des Artikels, der Preis des Artikels, die Anzahl, wie oft der Artikel bestellt wurde, und der Gesamtpreis der Bestellung 
	aufgelistet. Am Schluss wird die Geldsumme aller aufgelisteten Bestellungen ausgegeben. */
	if(strcmp($knr,"") !=0)
	{
		//Geldsummer aller Bestellungen
		$summe=0;
		//Alle Bestellungen, in denen die Person bestellt hat, werden rausgesucht
		$bp = "select artikel_db.name, artikel_db.preis, bestellungen_db.anzahl, round(artikel_db.preis*bestellungen_db.anzahl,2) as gesamtpreis from 			artikel_db left outer join bestellungen_db on bestellungen_db.artikelnummer = artikel_db.nummer where bestellungen_db.kundennummer = '$knr' order by artikel_db.name";
		$result = $conn->query($bp);
		/*Pro Bestellung wird der Name der Artikels, der bestellt wurde, die Einzelpreis dieses Artikels, die Anzahl, wie oft der
		Artikel bestellt wurde, und der Gesamtpreis der Bestellung ausgegeben */ 
		echo("<table>");
		echo("<tr> <th>Artikelname</th> <th>Anzahl</th> <th> Einzelpreis </th> <th> Gesamtpreis </th> </tr>");
		while(list($artikelname,$einzelpreis,$anzahl,$gesamtpreis) = $result->fetch_row())
		{
			$summe = $summe + $gesamtpreis;
			echo("<tr> <td>$artikelname</td> <td>$anzahl</td> <td>$einzelpreis</td> <td> $gesamtpreis</td></tr>");
		} 
		echo("</table>");
		echo("Summe: " . $summe);
		
	}	
	
	else
	{
		//falls keine Kundenummer eingegeben wurde
		echo("Es wurde keine Kundennummer eingegeben");
	}
	
	
?>
