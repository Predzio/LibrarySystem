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
	$wynik = mysqli_query($mysqli, "SELECT * FROM `kategoria`")	
	or die('Błąd zapytania');	

	if(mysqli_num_rows($wynik) > 0) 
	{
		
		echo "<table class = 'brama'>";
		echo "<tr class = 'around'>";
		echo "<td>ID</td>";
		echo "<td>NAZWA</td>";
		echo "</tr>";
		
		while($r = mysqli_fetch_assoc($wynik)) 
		{
			echo "<tr>";
			echo "<td class = 'brama'>".$r['id_kategoria']."</td>";
			echo "<td class = 'brama'>".$r['nazwa']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	} 
	
	if(isset($_POST['wyslij']) == true)
	{
		$kategoria = $_POST['kategoria'];
		
		$insert = mysqli_query($mysqli, "INSERT INTO kategoria SET nazwa = '$kategoria' ");
    
		if($insert) echo "Rekord został dodany poprawnie";
		else echo "Błąd nie udało się dodać nowego rekordu";
		//Zapobiega wysyłaniu tych samych danych kilkakrotnie
		echo "<script type=\"text/javascript\">
		window.setTimeout(\"window.location.replace('Kategoria.php');\",100);
		</script>"; 
		}
	
	$mysqli->close();	//Zamyka baze po zakończeniu pracy
	
	?>
	
		<h1>DODAJ KATEGORIE</h1>
		<form method = "POST"/>
		<table>
		
		<tr>
		<td>Kategoria</td> <td><input type = "text" name = "kategoria"></td>
		</tr>
		<tr>
		<td></td> <td><input type = "submit" name = "wyslij" value = "Utwórz kategorię"></td>
		</tr>
		
		</table>
		</form>
		
	</div>
		
	</body>

</html>