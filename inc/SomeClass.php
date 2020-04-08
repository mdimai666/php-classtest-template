<?php

class SomeClass {

	private $host;
	
	private $pid;
	private $cn;
	private $scid;
	private $login;
	private $pass;

	private $config;

	// наша цель тут https://sgo.e-yakutia.ru/
	// $pid, $cn и $scid = идентификаторы школы
	public function __construct($host, $login, $pass) {

		$this->host		= rtrim($host,'/');
		$this->login	= $login;
		$this->pass		= $pass;

		$this->config = new NConfig(__DIR__.'/'.'../config.ignore.json');
		$this->config->read([ 'value1' => 0 ]);
		// $config->save();

	}

	public function GetPostData()
	{
		return $this->GET('https://wordpress.org/wp-json/wp/v2/users');
	}

	public function Test() {
		return [
			'a' => 1,
			'b' => 2,
			'c' => 3,
		];
	}

	public function ConfigValue() {
		return @$this->config->json['value1'];
	}

	public function Increment() {
		$val = ++$this->config->json['value1'];
		$this->config->save();
		return $val;
	}

	public function Decrement() {
		$val = --$this->config->json['value1'];
		$this->config->save();
		return $val;
	}

	public function GET($url) {
		$json = file_get_contents((strpos($url, 'http')>-1?'':$this->host).$url);
		return json_decode($json, true);
	}

	public function POST($url, $data = []) {
		$data_string = json_encode($data);		
		$ch = curl_init( (strpos($url, 'http')>-1?'':$this->host).$url );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $data_string );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));   
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );   
		$result = curl_exec($ch);
		curl_close($ch);    
		return $result;
	}
}
