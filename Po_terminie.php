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
	$wynik = mysqli_query($mysqli, "SELECT * FROM `zamowienie` WHERE data_zwrotu IS NULL ")	
	or die('Błąd zapytania');
	$wynik2 = mysqli_query($mysqli, "SELECT * FROM `zamowienie` WHERE data_zwrotu IS NULL")	
	or die('Błąd zapytania');	
		print "<h1>PO TERMINIE:</h1>";
		
		$count = 0;
		while($r = mysqli_fetch_assoc($wynik)) 
		{
			$count++;
			
		}
		
		print "<b>Ilość ".$count."</b>";
		
		if(mysqli_num_rows($wynik) > 0) 
	{
		
		echo "<table>";
		echo "<tr class = 'around'>";
		echo "<td>ID</td>";
		echo "<td>ID CZYTELNIKA</td>";
		echo "<td>ID KSIĄŻKI</td>";
		echo "<td>DATA ZAMÓWIENIA</td>";
		echo "<td>DATA ODBIORU</td>";
		echo "<td>DATA ZWROTU</td>";
		echo "</tr>";
		
		while($r = mysqli_fetch_assoc($wynik2)) 
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
	
	?>
	</div>
		
	</body>

</html>