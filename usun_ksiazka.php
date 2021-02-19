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
	$wynik = mysqli_query($mysqli, "SELECT * FROM `ksiazka`")	
	or die('Błąd zapytania');	

	if(mysqli_num_rows($wynik) > 0) 
	{
		
		echo "<table>";
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
		
		print "<form method = 'POST'>ID: <input type = 'text' name = 'usun'><input type = 'submit' name = 'wys' value = 'Usuń'></form>";
		echo "</table>";
		
		if(isset($_POST['wys']))
		{
			$id = $_POST['usun'];
			mysqli_query($mysqli, "DELETE FROM ksiazka WHERE id_ksiazka=$id");
		}
		echo "</table>";
	} 
	
	$mysqli->close();
	
	?>
		
	</div>
		
	</body>

</html>