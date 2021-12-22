<?php

class SaveDb extends CI_Controller
{
	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("SaveToDB");
		$this->load->model("GeneralModel");
	}

	public function saveUsertoDB()
	{
		$json_contents = file_get_contents("php://input");
		$contents = json_decode($json_contents, true);
		$is_numeric = null;
		if (!is_array($contents)) {
			$requestarray = array();
		} else {
			$requestarray = $contents;
			if (isset($requestarray["is_numeric"])) {
				$is_numeric = $requestarray["is_numeric"];
				unset($requestarray["is_numeric"]);
			}
		}
		$resultfromDB = $this->GeneralModel->getResultfromDB($requestarray, "user", $is_numeric);
		return $resultfromDB;

	}

//	public function saveCargotoDB()
//	{
//		$json_contents = file_get_contents("php://input");
//		$contents = json_decode($json_contents, true);
//		if (!is_array($contents)) {
//			$contents = array();
//		}
//		$resultfromDB = $this->SaveToDB->saveCargotoDB($contents);
//		return $resultfromDB;
//	}

	public function saveSubscribertoDB()
	{
		$json_contents = file_get_contents("php://input");
		$contents = json_decode($json_contents, true);
		$is_numeric = null;
		if (!is_array($contents)) {
			$requestarray = array();
		} else {
			$requestarray = $contents;
			if (isset($requestarray["is_numeric"])) {
				$is_numeric = $requestarray["is_numeric"];
				unset($requestarray["is_numeric"]);
			}
		}
		$resultfromDB = $this->GeneralModel->getResultfromDB($requestarray, "subscriber", $is_numeric);
		$request_cargo_id = $requestarray["insert"]["subscriber_cargo_id"];
		$requestarray = array(
			"where" => array(
				"cargo_id" => $request_cargo_id
			),
			"update" => array(
				"cargo_status" => 1
			),
			"is_numeric" => true
		);
		$resultUpdateDB = $this->GeneralModel->getResultfromDB($requestarray, "cargo", true);
		echo json_encode($resultfromDB);

	}

	public function saveSearchCargoInfoToApi()
	{
		$json_contents = file_get_contents("php://input");
		$contents = json_decode($json_contents, true);
		$is_numeric = null;
		if (!is_array($contents)) {
			$rulesforquery = array();
		} else {
			$rulesforquery = $contents;
			if (isset($rulesforquery["is_numeric"])) {
				$is_numeric = $rulesforquery["is_numeric"];
				unset($rulesforquery["is_numeric"]);
			}
		}
		date_default_timezone_set('Europe/Istanbul');
		$created_time = date("Y-m-d H:i:s");
		$requestarray = array(
			"insert" => array(
				"cargo_user_id" => $rulesforquery["user_id"],
				"cargo_description" => $rulesforquery["gonderi_icerik"],
				"cargo_weight" => $rulesforquery["kilo"],
				"cargo_weight_unit" => "KG",
				"cargo_volume" => $rulesforquery["hacim"],
				"cargo_price" => $rulesforquery["cargo_price"],
				"cargo_address_from" => $rulesforquery["gonderici_adres"],
				"cargo_address_to" => $rulesforquery["alici_adres"],
				"cargo_name_to" => $rulesforquery["alici_isim"],
				"cargo_surname_to" => $rulesforquery["alici_soyisim"],
				"cargo_phone_num_to" => $rulesforquery["alici_numara"],
				"cargo_status" => 0,
				"cargo_delivery_time" => isset($rulesforquery["kargotarih"]) ?
					($rulesforquery["kargotarih"] != "undefined" ? $rulesforquery["kargotarih"] :
						date('Y-m-d H:i:s', strtotime($created_time. ' + 1 days'))) :
						date('Y-m-d H:i:s', strtotime($created_time. ' + 1 days')),
				"cargo_packet_time" => $created_time,
				"cargo_vehicle_id" => $rulesforquery["cargo_vehicle_id"],
				"cargo_payment_id" => 1,
				"cargo_row_status" => 1,
				"cargo_adress_to_district_key" => $rulesforquery["varis_ilce"],
				"cargo_adress_from_district_key" => $rulesforquery["cikis_ilce"]
			));

		$resultfromDB = $this->GeneralModel->getResultfromDB($requestarray, "cargo", $is_numeric);

		//return $resultfromDB;
		echo json_encode($rulesforquery);
	}
}
