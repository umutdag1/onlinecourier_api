<?php
class GetDb extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("GetFromDb");
		$this->load->model("GeneralModel");
	}

	public function getCargofromDb()
	{
		$json_contents = file_get_contents("php://input");
		$contents = json_decode($json_contents,true);
		$is_numeric = null;
		if(!is_array($contents)){
			$rulesforquery = array();
		} else {
			$rulesforquery = $contents;
			if (isset($rulesforquery["is_numeric"])) {
				$is_numeric = $rulesforquery["is_numeric"];
				unset($rulesforquery["is_numeric"]);
			}
		}
		$resultfromDB = $this->GeneralModel->getResultfromDB($rulesforquery,"cargo",$is_numeric);

		echo json_encode($resultfromDB);
	}

	public function getCityfromDb(){
		$json_contents = file_get_contents("php://input");
		$contents = json_decode($json_contents,true);
		$is_numeric = null;
		if(!is_array($contents)){
			$rulesforquery = array();
		} else{
			$rulesforquery = $contents;
			if (isset($rulesforquery["is_numeric"])) {
				$is_numeric = $rulesforquery["is_numeric"];
				unset($rulesforquery["is_numeric"]);
			}
		}

		$resultfromDB = $this->GeneralModel->getResultfromDB($rulesforquery,"city",$is_numeric);


		echo json_encode($resultfromDB);
	}

	public function getDistrictfromDb(){
		$json_contents = file_get_contents("php://input");
		$contents = json_decode($json_contents,true);
		$is_numeric = null;
		if(!is_array($contents)){
			$rulesforquery = array();
		} else{
			$rulesforquery = $contents;
			if (isset($rulesforquery["is_numeric"])) {
				$is_numeric = $rulesforquery["is_numeric"];
				unset($rulesforquery["is_numeric"]);
			}
		}

		$resultfromDB = $this->GeneralModel->getResultfromDB($rulesforquery,"district",$is_numeric);


		echo json_encode($resultfromDB);
	}

	public function getVehiclefromDb(){
		$json_contents = file_get_contents("php://input");
		$contents = json_decode($json_contents,true);
		$is_numeric = null;
		if(!is_array($contents)){
			$rulesforquery = array();
		} else{
			$rulesforquery = $contents;
			if (isset($rulesforquery["is_numeric"])) {
				$is_numeric = $rulesforquery["is_numeric"];
				unset($rulesforquery["is_numeric"]);
			}
		}

		$resultfromDB = $this->GeneralModel->getResultfromDB($rulesforquery,"vehicle",$is_numeric);

		echo json_encode($resultfromDB);
	}

	public function getUserfromDb(){
		$json_contents = file_get_contents("php://input");
		$contents = json_decode($json_contents,true);
		$is_numeric = null;
		if(!is_array($contents)){
			$rulesforquery = array();
		} else{
			$rulesforquery = $contents;
			if (isset($rulesforquery["is_numeric"])) {
				$is_numeric = $rulesforquery["is_numeric"];
				unset($rulesforquery["is_numeric"]);
			}
		}

		$resultfromDB = $this->GeneralModel->getResultfromDB($rulesforquery,"user",$is_numeric);

		echo json_encode($resultfromDB);
	}
}
