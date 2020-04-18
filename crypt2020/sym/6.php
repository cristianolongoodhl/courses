<?php
require('caesar.php');
$key=(int)$_POST['key'];
if ($key==0) die('la chiave non &egrave; un numero intero oppure &egrave; 0');
if ($key>20) die('la chiave deve essere un numero compreso tra 1 e 20');
$ciphertext=$_POST['ciphertext'];
$cleartext=decodeCaesar($ciphertext,$key);

$cleartext='';
for($i=0; $i<strlen($ciphertext); $i++){
	$c=substr($ciphertext, $i, 1);
	$decodedchar=chr(ord($c)-$key);
	$cleartext.=$decodedchar;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Crypto2020 - Cifrario di Cesare - Risultato della Decifrazione</title>
		<link rel="stylesheet" href="crypt.css">	
	</head>
	<body>

	<header>
		<h1>Crypto2020 - Cifrario di Cesare - Risultato della Decifrazione</h1>
		<nav><a href="5.php"> &#10094; indietro </a>| <a href="7.php"> avanti &#10095;</a></nav>
	</header>

	<dl>
		<dt>Chiave</dt><dd><?=$key?></dd>
		<dt>Testo cifrato</dt><dd><?=$ciphertext?></dd>
		<dt>Testo in chiaro</dt><dd><?=$cleartext?></dd>
	</dl>
	</body>
</html>

