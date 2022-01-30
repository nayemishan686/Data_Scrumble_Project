<?php
	//function for generating key
	function displayKey($key) {
		printf("value = %s", $key);
	}

	//function for encoding data
	function encodeData($originalData, $key){
		$originalKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
		$data = '';
		$length = strlen($originalData);
		for($i = 0; $i < $length; $i++){
			$currentChar = $originalData[$i];
			$position = strpos($originalKey, $currentChar);
			if($position !== false){
				$data .= $key[$position];
			}else{
				$data .= $currentChar;
			}
		}
		return $data;
	}

	//function to decoding data
	function decodeData($originalData, $key){
		$originalKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
		$data = '';
		$length = strlen($originalData);
		for($i=0; $i<$length; $i++){
			$currentChar = $originalData[$i];
			$position = strpos($key, $currentChar);
			if($position !== false){
				$data .= $originalKey[$position];
			}else{
				$data .= $currentChar;
			}
		}
		return $data;
	}

?>