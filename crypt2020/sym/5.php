<?php
if (isset($_REQUEST['key'])){
	$key=(int)$_REQUEST['key'];
	if ($key==0) die('la chiave non &egrave; un numero intero oppure &egrave; 0');
	if ($key>20) die('la chiave non deve essere maggiore di 20');
	require('caesar.php');
	$ciphertext=$_REQUEST['ciphertext'];
	$cleartext=decodeCaesar($ciphertext,$key);
	$cleartexturlencoded=urlencode($cleartext);
	$backwardurl="3.php?key=$key&cleartext=$cleartexturlencoded";
	$keyStr="value=\"$key\"";
} else {
	$key='';
	$keyStr='';
	$cleartext='';
	$backwardurl='5.php';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Crypto2020 - Cifrario di Cesare - Decifrazione</title>
		<link rel="stylesheet" href="../crypt.css">	
	</head>
	<body>

	<header>
		<h1>Crypto2020 - Cifrario di Cesare - Decifrazione</h1>
		<nav><a href="<?=$backwardurl?>"> &#10094; indietro</a>| <a href="7.php"> avanti &#10095;</a></nav>
	</header>

	<form method="POST">
		<p>
			<label>Chiave - inserire un numero intero tra 1 e 20</label> 
			<input type="text" name="key" id="key" size="2" <?=$keyStr?> />
		</p>
		<p>
			<label>Testo cifrato - inserire il testo da decifrare</label>
			<textarea name="ciphertext" id="ciphertext" rows="5" cols="20"><?=$ciphertext?></textarea>
		</p>
		<p>
			<input type="submit" name="decrypt" value="esegui la decifrazione" />
		</p>
	</form>
<?php
if (isset($_POST['key'])){
	echo "\t<h2>Testo in chiaro</h2>\n";
	echo "\t<p class=\"crypt\">$cleartext</p>\n";
}
?>
	</body>
</html>

