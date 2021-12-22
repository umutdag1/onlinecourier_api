<?php

class Curly {

	public $app_key;
	public $secret_key;
	public $response;
	public $response_code;
	public $response_data;

	public function __construct() {
		$this->app_key="Ed13uh69!==";
		$this->secret_key="Ed13uh69!==";

	}

	public function API_Headers($data_string)
	{
		return [
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string),
			'app_key: '.$this->app_key ,
			'secret_key: '.$this->secret_key];
	}

	public function get($url){
		$data_string="";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->API_Headers($data_string));
		$result = curl_exec($ch);
		$this->response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$this->response_data=$result;
		//return $result;

		$this->response=["response_code"=> $this->response_code,"response_data"=> $this->response_data];
	}

	public function post($url, $data_string){

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_FAILONERROR, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->API_Headers($data_string));


		$result = curl_exec($ch);
		$this->response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$this->response_data=$result;
		//return $result;

		$this->response=["response_code"=> $this->response_code,"response_data"=> $this->response_data];
	}

	public function put($url, $data_string){

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_FAILONERROR, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string))
		);

		$result = curl_exec($ch);
		$this->response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$this->response_data=$result;
		//return $result;

		$this->response=["response_code"=> $this->response_code,"response_data"=> $this->response_data];
	}

	public function delete($url, $data_string){

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_FAILONERROR, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string))
		);

		$result = curl_exec($ch);
		$this->response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$this->response_data=$result;
		//return $result;

		$this->response=["response_code"=> $this->response_code,"response_data"=> $this->response_data];
	}

	public function getResponse()
	{
		return $this->response;
	}

}
