<?php
	function encode($string){
		$cipher="AES-128-CTR";
		$options=0;
		$encryption_iv='1234567891011121';
		$encryption_key="frozenhub";
		return openssl_encrypt($string, $cipher, $encryption_key, $options, $encryption_iv);
	}
	
	function decode($string){
		$cipher="AES-128-CTR";
		$options=0;
		$encryption_iv='1234567891011121';
		$encryption_key="frozenhub";
		return openssl_decrypt($string, $cipher, $encryption_key, $options, $encryption_iv);
	}
?>