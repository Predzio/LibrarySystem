<html>

	<head>
		
		<meta charset = "utf-8"/>
		<meta name="Author" content="Adrian Kubik" />
		<title>czytelnik</title>
		<link rel = "stylesheet" type = "text/css" href = "biblioteka.css"/>
		
	</head>
	
	<body class = "index">
	
	<div class = "prawa">
	<?php
 
	$mysqli = new mysqli('localhost', 'root', 'zaq1@WSX', 'biblioteka');	
	mysqli_select_db($mysqli, 'biblioteka');
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	$czytelnik = mysqli_query($mysqli, "SELECT id_czytelnik FROM `czytelnik`")	
	or die('Błąd zapytania');
	
	$ksiazki = mysqli_query($mysqli, "SELECT id_ksiazka FROM `ksiazka`")	
	or die('Błąd zapytania');	
	
	$termin = mysqli_query($mysqli, "SELECT * FROM `zamowienie` WHERE data_zwrotu IS NULL")	
	or die('Błąd zapytania');

	$wypozyczonych = mysqli_query($mysqli, "SELECT * FROM `zamowienie` WHERE data_zwrotu IS NULL")	
	or die('Błąd zapytania');

		print "<center><h1>STATYSTYKI:</h1></center>";
		$count_czytelnik = 0;
		$count_ksiazki = 0;
		$count_termin = 0;
		$count_wypozyczonych = 0;
		
		while($r = mysqli_fetch_assoc($czytelnik)) 
		{
			$count_czytelnik++;
		}
		
		while($r = mysqli_fetch_assoc($ksiazki)) 
		{
			$count_ksiazki++;
		}
		
		while($r = mysqli_fetch_assoc($termin)) 
		{
			$count_termin++;
		}
		
		while($r = mysqli_fetch_assoc($wypozyczonych)) 
		{
			$count_wypozyczonych++;
		}
		print "<b>Liczba książek ".$count_ksiazki."</b></br>";
		print "<b>Liczba czytelników ".$count_czytelnik."</b></br>";	
		print "<b>Termin zwrotu upłynął ".$count_termin."</b></br>";
		print "<b>Liczba wypożyczonych ".$count_wypozyczonych."</b></br>";;
		
	$mysqli->close();	
	
	?>
		
	</div>
		
	</body>

</html>