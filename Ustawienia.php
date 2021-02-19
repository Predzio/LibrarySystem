<html>

	<head>
	
		<meta charset = "utf-8"/>
		<meta name="Author" content="Adrian Kubik" />
		<title>biblioteka</title>
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
			<td><a id = "ustawienia">7.USTAWIENIA</a></td>
			</tr>

			<tr>
			<td><u>KONTA</u>(UPRAWNIENIA)</td>	
			</tr>
			
			<tr>
			<td><u id = "biblio">- Bibliotekarz</u></text></td>
			</tr>
			
			<tr>
			<td><a id = "ukryty8" style="display: none" target = "ramkaa" href = "Statystykaa.php" >-Statystyka</a></td>
			</tr>
			
			<tr>
			<td><a id = "ukryty9" style="display: none" target = "ramkaa" href = "Po_terminie.php" >-Po terminie</a></td>
			</tr>
			
			<table id = "ukryty10" style="display: none">
			<form method = "POST" name = "fr2">
			
			<tr>
			<td>Login</td><td><input type = "text" name = "login2"/></td>
			</tr>
		
			<tr>
			<td>Hasło</td><td><input type = "password" name = "haslo2"/></td>
			</tr>
		
			<tr>
			<td></td><td><input type = "submit" name = "submit2" value = "Zaloguj"/></td>
			</tr>
		
			</form>
			
			</table>
			
			<tr>
			<td><u id = "adm">- Administrator(ZARZĄDZANIE)</u></td>
			</tr>
			
			<tr>
			<td><a id = "ukryty5" style="display: none" target = "ramkaa" href = "Kategoria.php" >-Dodawanie kategorii</a></td>
			</tr>
			
			<tr>
			<td><a id = "ukryty6" style="display: none" target = "ramkaa" href = "usun_czytelnika.php" >-Usuń czytelnika</a></td>
			</tr>
			
			<tr>
			<td><a id = "ukryty7" style="display: none" target = "ramkaa" href = "usun_ksiazka.php">-Usuń książkę</a></td>
			</tr>
			
			</table>
			
			<table id = "ukryty4" style="display: none">
			<form method = "POST" name = "fr">
			
			<tr>
			<td>Login</td><td><input type = "text" name = "login"/></td>
			</tr>
		
			<tr>
			<td>Hasło</td><td><input type = "password" name = "haslo"/></td>
			</tr>
		
			<tr>
			<td></td><td><input type = "submit" name = "submit" value = "Zaloguj"/></td>
			</tr>
		
			</form>
			
			</table>
			
			<table>	
			
			<tr>
			<td><a onclick = "Wyjscie.php">8.WYJŚCIE</a></td>
			</tr>
			
			</table>
			
		</div>
		
		<div id = "prawa">
		
		<iframe width='100%' height='99.8%' name = "ramkaa" id = "ramkaa" src=''></iframe>
		
		<?php
		if(empty($_POST['login']))
		{}
		else{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$submit = $_POST['submit'];
 
		$mysqli = new mysqli('localhost', 'root', 'zaq1@WSX', 'biblioteka');	
		mysqli_select_db($mysqli, 'biblioteka');
		mysqli_query($mysqli, "SET NAMES 'utf8'");
		$wynik = mysqli_query($mysqli, "SELECT * FROM `admin`")	
		or die('Błąd zapytania');
			
		$r = mysqli_fetch_assoc($wynik);
		if($login == $r['login'] AND $haslo == $r['haslo'] AND $submit == true)
		{
			print "<script>
			function admin()
			{
			document.getElementById('ukryty5').style.display='block';
			document.getElementById('ukryty6').style.display='block';
			document.getElementById('ukryty7').style.display='block';
			}
			admin();
			</script>";
		}
		else
			print "Błędny login lub hasło";
		
		$mysqli->close();
		}
		
		?>
		
		<?php
		if(empty($_POST['login2']))
		{}
		else{
		$login = $_POST['login2'];
		$haslo = $_POST['haslo2'];
		$submit = $_POST['submit2'];
 
		$mysqli = new mysqli('localhost', 'root', 'zaq1@WSX', 'biblioteka');		
		mysqli_select_db($mysqli, 'biblioteka');
		mysqli_query($mysqli, "SET NAMES 'utf8'");
		$wynik = mysqli_query($mysqli, "SELECT * FROM `bibliotekarz`")	
		or die('Błąd zapytania');
			
		$r = mysqli_fetch_assoc($wynik);
		if($login == $r['login'] AND $haslo == $r['haslo'] AND $submit == true)
		{
			print "<script>
			function bibliotekarz()
			{	
			document.getElementById('ukryty8').style.display='block';
			document.getElementById('ukryty9').style.display='block';
			}
			bibliotekarz();
			</script>";
		}
		else
			print "Błędny login lub hasło";
		
		$mysqli->close();
		}
		
		?>
	
	<script>
		
		
		
		function logowanie()
		{
			document.getElementById("ukryty4").style.display='block';
			document.getElementById("ukryty10").style.display='none';
		}
		document.getElementById('adm').onclick = logowanie;
		
		function logowanie2()
		{
			document.getElementById("ukryty10").style.display='block';
			document.getElementById("ukryty4").style.display='none';
		}
		document.getElementById('biblio').onclick = logowanie2;
	</script>

	</div>
	
	</body>

</html>