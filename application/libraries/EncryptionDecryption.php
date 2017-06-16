<?php
	
	class EncryptionDecryption {
		
		/*Convert string in to hexadecimal format*/
		private function strToHex($string){
			$hex = '';
			for ($i=0; $i<strlen($string); $i++){
				$ord = ord($string[$i]);
				$hexCode = dechex($ord);
				$hex .= substr('0'.$hexCode, -2);
			}
			return strToUpper($hex);
		}
		
		/*Convert hexadecimal format to string*/
		private function hexToStr($hex){
			$string='';
			for ($i=0; $i < strlen($hex)-1; $i+=2){
				$string .= chr(hexdec($hex[$i].$hex[$i+1]));
			}
			return $string;
		}
		
		function arsEncode($string){
			$string = base64_encode($string);
			$string =$this-> strToHex($string);
			return $string;
		}
		
		function arsDecode($string){
			$string = $this->hexToStr($string);
			$string = base64_decode($string);
			return $string;
		}
		
	}