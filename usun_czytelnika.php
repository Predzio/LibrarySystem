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
	$wynik = mysqli_query($mysqli, "SELECT id_czytelnik, login, haslo, imie, nazwisko, adres, miasto, wojewodztwo, telefon, kod_pocztowy, email FROM `czytelnik`")	
	or die('Błąd zapytania');	

	if(mysqli_num_rows($wynik) > 0) 
	{
		
		echo "<table>";
		echo "<tr class = 'around'>";
		echo "<td>ID</td>";
		echo "<td>LOGIN</td>";
		echo "<td>HASŁO</td>";
		echo "<td>IMIĘ</td>";
		echo "<td>NAZWISKO</td>";
		echo "<td>ADRES</td>";
		echo "<td>MIASTO</td>";
		echo "<td>WOJEWÓDZTWO</td>";
		echo "<td>TELEFON</td>";
		echo "<td>KOD POCZTOWY</td>";
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
			echo "<td class = 'brama'>".$r['wojewodztwo']."</td>";
			echo "<td class = 'brama'>".$r['telefon']."</td>";
			echo "<td class = 'brama'>".$r['kod_pocztowy']."</td>";
			echo "<td class = 'brama'>".$r['email']."</td>";		 
			echo "</tr>";
		}
		print "<form method = 'POST'>ID: <input type = 'text' name = 'usun'><input type = 'submit' name = 'wys' value = 'Usuń'></form>";
		echo "</table>";
		
		if(isset($_POST['wys']))
		{
			$id = $_POST['usun'];
			mysqli_query($mysqli, "DELETE FROM czytelnik WHERE id_czytelnik=$id");
		}
	}
	
	$mysqli->close();
	
	?>
		
	</div>
		
	</body>

</html>