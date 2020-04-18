<?php
if (isset($_POST['encode']) || isset($_POST['decode'])){
	$alg=$_POST['alg'];
	$key=$_POST['key'];
	$keyValueStr=" value=\"$key\"";
	if (isset($_POST['encode'])){
		$cleartext=$_POST['cleartext'];
		$ciphertext=openssl_encrypt($cleartext,$alg,$key);
	} else {
		$ciphertext=$_POST['ciphertext'];
		$cleartext=openssl_decrypt($ciphertext,$alg,$key);		
	}
} else {
	$keyValueStr='';
	$cleartext='';
	$ciphertext='';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Crypto2020 - Algoritmi Avanzati di Cifratura</title>
		<link rel="stylesheet" href="../crypt.css" />	
	</head>
	<body>

	<header>
		<h1>Crypto2020 - Algoritmi Avanzati di Cifratura</h1>
		<nav><a href="8.php"> &#10094; indietro</a> | <a href="11.php"> avanti &#10095;</a></nav>
	</header>

	<form method="POST">
		<p><label>Algoritmo</label>
		<select name="alg" id="alg">
<?php
$algs=openssl_get_cipher_methods();
foreach($algs as $algName){
	if (isset($alg) && strcmp($alg,$algName)==0) 
		echo "\t\t\t<option value=\"$algName\" selected>$algName</option>\n";
	else
		echo "\t\t\t<option value=\"$algName\">$algName</option>\n";
}
?>
		</select>
		</p>

		<p>
			<label>Chiave</label> 
			<input type="text" name="key" id="key" size="20" <?=$keyValueStr?> />
		</p>
		<fieldset class="crypt">
			<textarea name="cleartext" id="cleartext" rows="10" cols="20"><?=$cleartext?></textarea>
			<ul>
				<li><input type="submit" name="encode" value="cifratura      &#10095;&#10095;" /></li>
				<li><input type="submit" name="decode" value="&#10094;&#10094; decifrazione" /></li>
			</ul>
			<textarea name="ciphertext" id="ciphertext" rows="10" cols="20"><?=$ciphertext?></textarea>
		</fieldset>
		<p>
			<input type="submit" value="esegui la cifratura" />
		</p>
	</form>
	</body>
</html>

