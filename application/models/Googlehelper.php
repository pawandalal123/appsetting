<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Googlehelper extends CI_Model {
	 	
	
		public function __construct() {
		 	$this->mapApiKey='AIzaSyD6dA5hFIkxCiybqRNgoMhJGjFJDCQ9NLI';
		 	parent::__construct();	
		}
		
		/**
		* Reads an URL to a string
		* @param string $url The URL to read from
		* @return string The URL content
		*/
		public function getcordinates($address)
		{
		 	$url = "http://maps.google.com/maps/api/geocode/json?address=".urlencode($address)."&sensor=false&region=India";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$response = curl_exec($ch);
			curl_close($ch);
			$response_a = json_decode($response);
			$dataArray = array('lat'=>$response_a->results[0]->geometry->location->lat,
				               'long'=>$response_a->results[0]->geometry->location->lng);
			return $dataArray;
		}


	}; //end class
?>