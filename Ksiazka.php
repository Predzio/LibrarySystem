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
	$wynik = mysqli_query($mysqli, "SELECT id_ksiazka, id_kategoria, isbn, tytul, autor, stron, wydawnictwo, rok_wydania, opis FROM `ksiazka`")	
	or die('Błąd zapytania');	

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
	
	if(isset($_POST['wyslij']) == true)
	{
		$kategoria = $_POST['kategoria'];
		$isbn = $_POST['isbn'];
		$tytul = $_POST['tytul'];
		$autor = $_POST['autor'];
		$stron = $_POST['stron'];
		$wydawnictwo = $_POST['wydawnictwo'];
		$rok_wydania = $_POST['rok_wydania'];
		$opis = $_POST['opis'];
		
		$insert = mysqli_query($mysqli, "INSERT INTO ksiazka SET id_kategoria = '$kategoria', isbn = '$isbn', tytul = '$tytul', autor = '$autor', stron = '$stron', wydawnictwo = '$wydawnictwo'
		, rok_wydania = '$rok_wydania', opis = '$opis' ");
    
		if($insert) echo "Rekord został dodany poprawnie";
		else echo "Błąd nie udało się dodać nowego rekordu";
		//Zapobiega wysyłaniu tych samych danych kilkakrotnie
		echo "<script type=\"text/javascript\">
		window.setTimeout(\"window.location.opener('phonebook.php');\",100);
		</script>"; 
		}
	
	$mysqli->close();	//Zamyka baze po zakończeniu pracy
	
	?>
	
		<h1>NOWA KSIĄŻKA</h1>
		<form method = "POST"/>
		<table>
		
		<tr>
		<td>Kategoria</td> <td><select name="kategoria">
									<option value = "1">1.Biznes</option>
									<option value = "2">2.Poradniki</option>
									<option value = "3">3.Programowanie</option>
									<option value = "4">4.Programowanie mobilne</option>
									<option value = "5">5.Webmasterstwo</option>
									<option value = "6">6.Systemy operacyjne</option>
		
		</select></td>
		</tr>
		
		<tr>
		<td>ISBN</td> <td><input type = "text" name = "isbn"></td>
		</tr>
		
		<tr>
		<td>Tytuł</td> <td><input type = "text" name = "tytul"></td>
		</tr>
		<tr>
		<td>Autor</td> <td><input type = "text" name = "autor"></td>
		</tr>
		
		<tr>
		<td>Ilość stron</td> <td><input type = "text" name = "stron"></td>
		</tr>
		
		<tr>
		<td>Wydawnictwo</td> <td><input type = "text" name = "wydawnictwo"></td>
		</tr>
		
		<tr>
		<td>Rok wydania</td> <td><input type = "text" name = "rok_wydania"></td>
		</tr>
		
		<tr>
		<td>Opis</td> <td><textarea id = "opis"  name = "opis">Tutaj opis...</textarea></td>
		</tr>
		
		<tr>
		<td></td> <td><input type = "submit" name = "wyslij" value = "Dodaj książkę"></td>
		</tr>
		
		</table>
		</form>
		
	</div>
		
	</body>

</html>