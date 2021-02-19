<html>

	<head>
		
		<meta charset = "utf-8"/>
		<meta name="Author" content="Adrian Kubik" />
		<title>czytelnik</title>
		<link rel = "stylesheet" type = "text/css" href = "biblioteka.css"/>
		
	</head>
	
	<body class = "index">
	
		<div id = "baner">		
			<img src = "logo.png"/>				
		</div>
		
		<div id = "lewa">
			<table>
			
			<tr>
			<td><h1>Menu główne</h1></br></td>
			</tr>
			
			<tr>
			<td><a href = "Czytelnik.php" id = "czytelnik">1.DODAJ CZYTELNIKA </a></td>
			</tr>
			
			<tr>
			<td><a href = "Ksiazka.php">2.DODAJ KSIĄŻKĘ</a></td>
			</tr>
			
			<tr>
			<td><a href = "Wypozyczenia.php">3.WYPOŻYCZENIA</a></td>
			</tr>
			
			<tr>
			<td><a href = "Raporty.php">4.RAPORTY</a></td>
			</tr>
			
			<tr>
			<td><a href = "Statystyka.php">5.STATYSTYKI</a></td>
			</tr>
			
			<tr>
			<td><a href = "Szukaj.php">6.WYSZUKIWANIE</a></td>
			</tr>
			
			<tr>
			<td><a href = "Ustawienia.php">7.USTAWIENIA</a></td>
			</tr>	
			
			<tr>
			<td><a href = "Wyjscie.php">8.WYJŚCIE</a></td>
			</tr>
			
			</table>
			
	</div>
	
	<div class = "prawa"> <!-- TUTAJ EDYCJA  !!!!!!!!!!!!!!!!!!-->
	<form method = "POST">
	<input type = "submit" name = "ksiazka52" value = "Lista książek"></br></br>
	<input type = "submit" name = "czytelnik52" value = "Lista czytelników"></br></br>
	<input type = "submit" name = "po_termin52" value = "Lista książek po terminie"></br></br>
	<input type = "submit" name = "wypozyczone52" value = "Lista wypożyczonych książek"></br></br>
	</form>
	<?php
	
	if(isset($_POST['ksiazka52']))
	{
	$mysqli = new mysqli('localhost', 'root', 'zaq1@WSX', 'biblioteka');
	mysqli_select_db($mysqli, 'biblioteka');
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	$wynik = mysqli_query($mysqli, "SELECT * FROM `ksiazka`") or die('Błąd zapytania');	
	
	print "<h1>LISTA KSIĄŻEK</h1>";
	if(mysqli_num_rows($wynik) > 0) 
	{
		
		echo "<table class = 'brama'>";
		echo "<tr class = 'around'>";
		echo "<td>ID</td>";
		echo "<td>KATEGORIA</td>";
		echo "<td>ISBN</td>";
		echo "<td>TYTUŁ</td>";
		echo "<td>AUTOR</td>";
		echo "<td>STRON</td>";
		echo "<td>WYDAWNICTWO</td>";
		echo "<td>ROK WYDANIA</td>";
		echo "<td>OPIS</td>";
		echo "</tr>";
		
		while($r = mysqli_fetch_assoc($wynik)) 
		{
			echo "<tr>";
			echo "<td class = 'brama'>".$r['id_ksiazka']."</td>";
			echo "<td class = 'brama'>".$r['id_kategoria']."</td>";
			echo "<td class = 'brama'>".$r['isbn']."</td>";
			echo "<td class = 'brama'>".$r['tytul']."</td>";
			echo "<td class = 'brama'>".$r['autor']."</td>";
			echo "<td class = 'brama'>".$r['stron']."</td>";
			echo "<td class = 'brama'>".$r['wydawnictwo']."</td>";
			echo "<td class = 'brama'>".$r['rok_wydania']."</td>";
			echo "<td class = 'brama'>".$r['opis']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	$mysqli->close();
	}	//KONIEC
	
	if(isset($_POST['czytelnik52']))
	{
	print "<h1>LISTA CZYTELNIKÓW</h1>";
	$mysqli = new mysqli('localhost', 'root', 'zaq1@WSX', 'biblioteka');
	mysqli_select_db($mysqli, 'biblioteka');
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	$wynik2 = mysqli_query($mysqli, "SELECT * FROM `czytelnik`") or die('Błąd zapytania');
	
	if(mysqli_num_rows($wynik2) > 0) 
	{
		
		echo "<table class = 'brama'>";
		echo "<tr class = 'around'>";
		echo "<td>ID</td>";
		echo "<td>LOGIN</td>";
		echo "<td>HASŁO</td>";
		echo "<td>IMIĘ</td>";
		echo "<td>NAZWISKO</td>";
		echo "<td>ADRES</td>";
		echo "<td>MIASTO</td>";
		echo "<td>KOD POCZTOWY</td>";
		echo "<td>WOJEWÓDZTWO</td>";
		echo "<td>TELEFON</td>";
		echo "<td>EMAIL</td>";
		echo "</tr>";
		
		while($r = mysqli_fetch_assoc($wynik2)) 
		{
			echo "<tr>";
			echo "<td class = 'brama'>".$r['id_czytelnik']."</td>";
			echo "<td class = 'brama'>".$r['login']."</td>";
			echo "<td class = 'brama'>".$r['haslo']."</td>";
			echo "<td class = 'brama'>".$r['imie']."</td>";
			echo "<td class = 'brama'>".$r['nazwisko']."</td>";
			echo "<td class = 'brama'>".$r['adres']."</td>";
			echo "<td class = 'brama'>".$r['miasto']."</td>";
			echo "<td class = 'brama'>".$r['kod_pocztowy']."</td>";
			echo "<td class = 'brama'>".$r['wojewodztwo']."</td>";
			echo "<td class = 'brama'>".$r['telefon']."</td>";
			echo "<td class = 'brama'>".$r['email']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	$mysqli->close();
	}	//KONIEC
	
	if(isset($_POST['po_termin52']))
	{
	print "<h1>LISTA KSIĄŻEK PO TERMINIE</h1>";
	$mysqli = new mysqli('localhost', 'root', 'zaq1@WSX', 'biblioteka');
	mysqli_select_db($mysqli, 'biblioteka');
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	$wynik3 = mysqli_query($mysqli, "SELECT * FROM `zamowienie` WHERE data_zwrotu IS NULL ")	or die('Błąd zapytania');
	if(mysqli_num_rows($wynik3) > 0) 
	{
		
		echo "<table class = 'brama'>";
		echo "<tr class = 'around'>";
		echo "<td>ID</td>";
		echo "<td>ID CZYTELNIKA</td>";
		echo "<td>ID KSIĄŻKI</td>";
		echo "<td>DATA ZAMÓWIENIA</td>";
		echo "<td>DATA ODBIORU</td>";
		echo "<td>DATA ZWROTU</td>";
		echo "</tr>";
		
		while($r = mysqli_fetch_assoc($wynik3)) 
		{
			echo "<tr>";
			echo "<td class = 'brama'>".$r['id_zamowienie']."</td>";
			echo "<td class = 'brama'>".$r['id_czytelnik']."</td>";
			echo "<td class = 'brama'>".$r['id_ksiazka']."</td>";
			echo "<td class = 'brama'>".$r['data_zamowienia']."</td>";
			echo "<td class = 'brama'>".$r['data_odbioru']."</td>";
			echo "<td class = 'brama'>".$r['data_zwrotu']."</td>";
			echo "</tr>";
		}
		echo "</table>"; //KONIEC
	}
	$mysqli->close();
	}	
	
	if(isset($_POST['wypozyczone52']))
	{
	print "<h1>LISTA WYPOŻYCZONYCH KSIĄŻEK</h1>";
	$mysqli = new mysqli('localhost', 'root', 'zaq1@WSX', 'biblioteka');
	mysqli_select_db($mysqli, 'biblioteka');
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	$wynik4 = mysqli_query($mysqli, "SELECT * FROM `zamowienie` ")	or die('Błąd zapytania');
	
	if(mysqli_num_rows($wynik4) > 0) 
	{
		
		echo "<table class = 'brama'>";
		echo "<tr class = 'around'>";
		echo "<td>ID</td>";
		echo "<td>ID CZYTELNIKA</td>";
		echo "<td>ID KSIĄŻKI</td>";
		echo "<td>DATA ZAMÓWIENIA</td>";
		echo "<td>DATA ODBIORU</td>";
		echo "<td>DATA ZWROTU</td>";
		echo "</tr>";
		
		while($r = mysqli_fetch_assoc($wynik4)) 
		{
			echo "<tr>";
			echo "<td class = 'brama'>".$r['id_zamowienie']."</td>";
			echo "<td class = 'brama'>".$r['id_czytelnik']."</td>";
			echo "<td class = 'brama'>".$r['id_ksiazka']."</td>";
			echo "<td class = 'brama'>".$r['data_zamowienia']."</td>";
			echo "<td class = 'brama'>".$r['data_odbioru']."</td>";
			echo "<td class = 'brama'>".$r['data_zwrotu']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	$mysqli->close();	
	}	
		
	
	?>
		
	</div>
		
	</body>

</html>