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
	
	<form method = "POST">
	
	<table>
	
	<tr>
	<td>Tytuł</td><td><input type = "text" name = "szukaj"/></td>
	<td><input type = "submit" name = "wyslij" value = "Szukaj!"/></td>
	</tr>
	<tr>
	<td>Autor</td><td><input type = "text" name = "szukaj2"/></td>
	<td><input type = "submit" name = "wyslij2" value = "Szukaj!"/></td>
	</tr>
	
	
	</table>
	
	</form>
	<?php
	
	if(isset($_POST['wyslij']))
	{
		$conn = mysqli_connect("localhost", "root", "zaq1@WSX", "biblioteka");
		$wynikowa = mysqli_query($conn, "SELECT tytul FROM ksiazka");
		
		while($r = mysqli_fetch_assoc($wynikowa))
		{
		$tablica = $r['tytul'];
			
		if($tablica == $_POST['szukaj'])
			print $tablica."</br>";
			
		}
		mysqli_close($conn);
	}
	
	if(isset($_POST['wyslij2']))
	{
		$conn2 = mysqli_connect("localhost", "root", "zaq1@WSX", "biblioteka");
		$wynikowa2 = mysqli_query($conn2, "SELECT autor FROM ksiazka");
		
		while($r = mysqli_fetch_assoc($wynikowa2))
		{
			$tablica = $r['autor'];
			
			if($tablica == $_POST['szukaj2'])
				print $tablica."</br>";
			
		}
		mysqli_close($conn2);
	}
	?>
		
	</div>
		
	</body>

</html>