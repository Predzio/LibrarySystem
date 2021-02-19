<html>

	<head>
		
		<meta charset = "utf-8"/>
		<meta name="Author" content="Adrian Kubik" />
		<title>Czytelnik</title>
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
			<td><a href = "Czytelnik.php">1.DODAJ CZYTELNIKA </a></td>
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
	mysqli_select_db($mysqli, "biblioteka");
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	$wynik = mysqli_query($mysqli, "SELECT * FROM `czytelnik`")	
	or die('Błąd zapytania');	

	if(mysqli_num_rows($wynik) > 0) 
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
		
		while($r = mysqli_fetch_assoc($wynik)) 
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
	
	if(isset($_POST['wyslij']) == true)
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$adres = $_POST['adres'];
		$miasto = $_POST['miasto'];
		$wojewodztwo = $_POST['wojewodztwo'];
		$telefon = $_POST['telefon'];
		$kod = $_POST['kod_pocztowy'];
		$email = $_POST['email'];
		
		$insert = mysqli_query($mysqli, "INSERT INTO czytelnik SET login = '$login', haslo = '$haslo', imie = '$imie', nazwisko = '$nazwisko', adres = '$adres', miasto = '$miasto'
		, wojewodztwo = '$wojewodztwo', telefon = '$telefon', kod_pocztowy = '$kod', email = '$email' ");
    
		if($insert) echo "Rekord został dodany poprawnie";
		else echo "Błąd nie udało się dodać nowego rekordu";
		echo "<script type=\"text/javascript\">
		window.setTimeout(\"window.location.replace('Czytelnik.php');\",100);
		</script>";
				
		}
	
	$mysqli->close();	//Zamyka baze po zakończeniu pracy
	
	?>
		
		<h1>NOWY CZYTELNIK</h1>
		<form method = "POST"/>
		<table>
		
		<tr>
		<td>Login</td> <td><input type = "text" name = "login"></td>
		</tr>
		
		<tr>
		<td>Hasło</td> <td><input type = "text" name = "haslo"></td>
		</tr>
		
		<tr>
		<td>Imię</td> <td><input type = "text" name = "imie">
		</tr>
		<tr>
		<td>Nazwisko</td> <td><input type = "text" name = "nazwisko">
		</tr>
		
		<tr>
		<td>Adres</td> <td><input type = "text" name = "adres">
		</tr>
		
		<tr>
		<td>Miasto</td> <td><input type = "text" name = "miasto">
		</tr>
		
		<tr>
		<td>Kod pocztowy</td> <td><input type = "text" name = "kod_pocztowy">
		</tr>
		
		<tr>
		<td>Województwo</td> <td><input type = "text" name = "wojewodztwo">
		</tr>
		
		<tr>
		<td>Telefon</td> <td><input type = "text" name = "telefon">
		</tr>
		
		<tr>
		<td>Email</td> <td><input type = "text" name = "email">
		</tr>
		
		<tr>
		<td>Uwagi</td> <td><textarea id="opis" name="opis"></textarea>
		</tr>
		
		<tr>
		<td></td> <td><input type = "submit" name = "wyslij" value = "Dodaj czytelnika">
		</tr>
		
		</table>
		</form>
	</div>
		
	</body>

</html>