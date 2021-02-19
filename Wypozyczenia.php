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
	
	<div class = "prawa">
	<?php
 
	$mysqli = new mysqli('localhost', 'root', 'zaq1@WSX', 'biblioteka');	
	mysqli_select_db($mysqli, 'biblioteka');
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	$wynik = mysqli_query($mysqli, "SELECT id_zamowienie, id_czytelnik, id_ksiazka, data_zamowienia, data_odbioru, data_zwrotu FROM `zamowienie`")	
	or die('Błąd zapytania');	

	if(mysqli_num_rows($wynik) > 0) 
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
		
		while($r = mysqli_fetch_assoc($wynik)) 
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
	
	if(isset($_POST['wyslij']) == true)
	{
		$id_czytelnik = $_POST['id_czytelnik'];
		$id_ksiazka = $_POST['id_ksiazka'];
		$data_zamowienia = $_POST['data_zamowienia'];
		$data_odbioru = $_POST['data_odbioru'];
		$data_zwrotu = $_POST['data_zwrotu'];
		
		$insert = mysql_query("INSERT INTO zamowienie SET id_czytelnik = '$id_czytelnik', id_ksiazka = '$id_ksiazka', data_zamowienia = '$data_zamowienia',
		data_odbioru = '$data_odbioru', data_zwrotu = '$data_zwrotu' ");
    
		if($insert) echo "<script>document.getElementById('zle_dobrze').innerHTML = 'Rekord został dodany poprawnie'";
		else echo "<script>document.getElementById('zle_dobrze').innerHTML = 'Błąd nie udało się dodać nowego rekordu'</script>";

		echo "<script type=\"text/javascript\">
		window.setTimeout(\"window.location.replace('index.html');\",100);
		</script>";
		}
	
	$mysqli->close();	//Zamyka baze po zakończeniu pracy
	
	?>
	
		<h1>WYPOŻYCZENIE</h1>
		<form method = "POST"/>
		<table>
		
		<tr>
		<td>ID czytelnika</td> <td><select name = "id_czytelnik">
									<option value = "1">czytelnik_1</option>
									<option value = "2">czytelnik_2</option>
									<option value = "3">czytelnik_3</option>
									<option value = "4"></option>		
		</select></td>
		</tr>
		
		<tr>
		<td>ID książki</td> <td><select name = "id_ksiazka">
									<option value = "1">1.PHP i MySQL. Tworzenie stron WWW. Vademecum profesjonalisty. Wydanie czwarte</option>
									<option value = "2">2.Język C++. Kompendium wiedzy</option>
									<option value = "3">3.Mistrz czystego kodu. Kodeks postępowania profesjonalnych programistów</option>
									<option value = "4">4.Kali Linux. Testy penetracyjne</option>
									<option value = "5">5.Czysty kod. Podręcznik dobrego programisty</option>	
									<option value = "6">6.Pragmatyczny programista. Od czeladnika do mistrza</option>	
									<option value = "7">7.Praca z zastanym kodem. Najlepsze techniki</option>	
									<option value = "8">8.Tajemnice JavaScriptu. Podręcznik ninja</option>	
									<option value = "9">9.Java EE 6. Tworzenie aplikacji w NetBeans 7</option>	
									<option value = "10">10.Projektowanie stron internetowych. Przewodnik dla początkujących webmasterów po HTML5, CSS3 i grafice. Wydanie IV</option>	
		</select></td>
		</tr>
		
		<tr>
		<td>Imię</td> <td><input type = "text" name = "imie"></td>
		</tr>
		
		<tr>
		<td>Nazwisko</td> <td><input type = "text" name = "nazwisko"></td>
		</tr>
		
		<tr>
		<td>Data zamówienia</td> <td><input type = "text" name = "data_zamowienia"></td>
		</tr>
		
		<tr>
		<td>Data odbioru</td> <td><input type = "text" name = "data_odbioru"></td>
		</tr>
		
		<tr>
		<td>Data zwrotu</td> <td><input type = "text" name = "data_zwrotu"></td>
		</tr>
		
		<tr>
		<td></td> <td><input type = "submit" name = "wyslij" value = "Wypożycz"></td>
		</tr>
		
		<tr>
		<td><p id = "zle_dobrze"></p></td>
		</tr>
		
		
		</table>
		</form>
		
	</div>
		
	</body>

</html>