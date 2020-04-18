<?php

/**
 * Encode the cleartext using the Caesar Cipher and the specified key.
 */
function encodeCaesar($cleartext, $key){
	$ciphertext='';
	for($i=0; $i<strlen($cleartext); $i++){
		$c=substr($cleartext, $i, 1);
		$encodedchar=chr(ord($c)+$key);
		$ciphertext.=$encodedchar;
	}
	return $ciphertext;
}

/**
 * Dencode the ciphertext encoded with the Caesar Cipher and the specified key.
 */

function decodeCaesar($ciphertext, $key){
	$cleartext='';
	for($i=0; $i<strlen($ciphertext); $i++){
		$c=substr($ciphertext, $i, 1);
		$decodedchar=chr(ord($c)-$key);
		$cleartext.=$decodedchar;
	}
	return $cleartext;
}
