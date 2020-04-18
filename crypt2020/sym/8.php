<?php
require('caesar.php');
if (isset($_REQUEST['key'])){
	$key=(int)$_REQUEST['key'];
	if ($key==0) die('la chiave non &egrave; un numero intero oppure &egrave; 0');
	if ($key>20) die('la chiave non deve essere maggiore di 20');
	$keyvalue="value=\"$key\"";
	$cleartext=$_REQUEST['cleartext'];
	$ciphertext=encodeCaesar($cleartext,$key);
	$ciphertexturlencoded=urlencode($ciphertext);
} else {
	$keyvalue='';
	$cleartext='';
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Crypto2020 - Attacco al Cifrario di Cesare</title>
		<link rel="stylesheet" href="../crypt.css" />	
	</head>
	<body>

	<header>
		<h1>Crypto2020 - Attacco al Cifrario di Cesare</h1>
		<nav><a href="7.php"> &#10094; indietro</a> | <a href="10.php"> avanti &#10095;</a></nav>
	</header>

	<p>Le chiavi nel cifrario di cesare variano tra 1 e 20 (per l'alfabeto italiano), &egrave;
	facile provarle tutte.</p>

	<form method="POST">
		<p>
			<label>Chiave - inserire un numero intero tra 1 e 20</label> 
			<input type="text" name="key" id="key" size="2" <?=$keyvalue?> />
		</p>
		<p>
			<label>Testo in chiaro - inserire il testo da cifrare, solo caratteri minuscoli e senza lettere accentate</label>
			<textarea name="cleartext" id="cleartext" rows="5" cols="20" class="crypt"><?=$cleartext?></textarea>
		</p>
		<p>
			<input type="submit" value="esegui la cifratura" />
		</p>
	</form>
<?php
if (isset($_POST['key'])){
	echo "\t<h2>Testo cifrato</h2>\n";
	echo "\t<p class=\"crypt\">$ciphertext</p>\n";

	echo "\t<h2>Attacco</h2>\n";
	echo "\t<table>\n\t\t<tr><th>Chiave</th><th>Decifrazione</th></tr>\n";
	for($k=1; $k<21 && (!isset($decoded) || strcmp($decoded,$cleartext)!=0); $k++){
		$decoded=decodeCaesar($ciphertext,$k);
		$matchClassStr=(strcmp($decoded,$cleartext)==0) ? " class=\"match\"" : '';
		echo "\t\t<tr$matchClassStr><td>$k</td><td>$decoded</td></tr>\n";
	}
	echo "\t</table>\n";
}
?>
	</body>
</html>

