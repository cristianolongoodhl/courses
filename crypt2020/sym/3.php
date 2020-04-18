<?php
if (isset($_REQUEST['key'])){
	$key=(int)$_REQUEST['key'];
	if ($key==0) die('la chiave non &egrave; un numero intero oppure &egrave; 0');
	if ($key>20) die('la chiave non deve essere maggiore di 20');
	require('caesar.php');
	$cleartext=$_REQUEST['cleartext'];
	$ciphertext=encodeCaesar($cleartext,$key);
	$ciphertexturlencoded=urlencode($ciphertext);
	$forwardurl="5.php?key=$key&ciphertext=$ciphertexturlencoded";
} else {
	$key='';
	$cleartext='';
	$forwardurl='5.php';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Crypto2020 - Cifrario di Cesare - Cifratura</title>
		<link rel="stylesheet" href="../crypt.css" />	
	</head>
	<body>

	<header>
		<h1>Crypto2020 - Cifrario di Cesare - Cifratura</h1>
		<nav>
			<a href="2.php"> &#10094; indietro</a> |
			<a href="<?=$forwardurl?>"> avanti &#10095;</a></nav>
		</nav>		
	</header>

	<form action="3.php" method="POST">
		<p>
			<label>Chiave - inserire un numero intero tra 1 e 20</label> 
			<input type="text" name="key" id="key" size="2" value="<?=$key?>" />
		</p>
		<p>
			<label>Testo in chiaro - inserire il testo da cifrare, solo caratteri minuscoli e senza lettere accentate</label>
			<textarea name="cleartext" id="cleartext" rows="5" cols="20"><?=$cleartext?></textarea>
		</p>
		<p>
			<input type="submit" value="esegui la cifratura" />
		</p>
	</form>
<?php
if (isset($ciphertext)){
	echo "\t<h2>Testo cifrato </h2>\n";
	echo "\t<p class=\"crypt\">$ciphertext</p>\n";
}
?>
	</body>
</html>

