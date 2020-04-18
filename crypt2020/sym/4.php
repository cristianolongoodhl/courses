<?php
$key=(int)$_POST['key'];
if ($key==0) die('la chiave non &egrave; un numero intero oppure &egrave; 0');
if ($key>20) die('la chiave non deve essere maggiore di 20');
require('caesar.php');
$cleartext=$_POST['cleartext'];
$ciphertext=encodeCaesar($cleartext,$key);
$ciphertexturlencoded=urlencode($ciphertext);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Crypto2020 - Cifrario di Cesare - Risultato della Codifica</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
	</head>
	<body>

	<header>
		<h1>Crypto2020 - Cifrario di Cesare - Risultato della Codifica</h1>
		<nav><a href="3.php"> &#10094; indietro</a> | 
		<a href="5.php?key=<?=$key?>&ciphertext=<?=$ciphertexturlencoded?>"> avanti &#10095;</a></nav>
	</header>

	<dl>
		<dt>Chiave</dt><dd><?=$key?></dd>
		<dt>Testo in chiaro</dt><dd><?=$cleartext?></dd>
		<dt>Testo cifrato</dt><dd><?=$ciphertext?></dd>
	</dl>
	</body>
</html>

