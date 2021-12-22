<?php

class SaveToDb extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function saveUsertoDB($contents_arr)
	{
		$return = null;
		if (array_key_exists("user_name", $contents_arr) && array_key_exists("user_surname", $contents_arr)
			&& array_key_exists("user_email", $contents_arr) && array_key_exists("user_password", $contents_arr)
			&& array_key_exists("user_address", $contents_arr) && array_key_exists("user_phone_num", $contents_arr)
			&& array_key_exists("user_created_time", $contents_arr)) {
			if (trim($contents_arr["user_name"]) != "" && trim($contents_arr["user_surname"]) != ""
				&& trim($contents_arr["user_email"]) != "" && trim($contents_arr["user_password"]) != ""
				&& trim($contents_arr["user_address"]) != "" && trim($contents_arr["user_phonenum"]) != ""
				&& trim($contents_arr["user_created_time"]) != "") {
				$this->db->insert('user', $contents_arr);
				if ($this->db->affected_rows > 0) {
					$return = $this->returnResult(200, "OK", null);
				} else {
					$return = $this->returnResult(400, "Bad Request", "Cannot Insert");
				}
			} else {
				$return = $this->returnResult(400, "Bad Request", "Values Cannot Be Empty");
			}
		} else {
			$return = $this->returnResult(400, "Bad Request", "Keys Not Found");
		}
		return $return;
	}


	public function saveCargotoDB($contents_arr)
	{
		$return = null;
		if (array_key_exists("cargo_user_id", $contents_arr) && array_key_exists("cargo_description", $contents_arr)
			&& array_key_exists("cargo_weight", $contents_arr) && array_key_exists("cargo_weight_unit", $contents_arr)
			&& array_key_exists("cargo_volume", $contents_arr) && array_key_exists("cargo_price", $contents_arr)
			&& array_key_exists("cargo_address_to", $contents_arr) && array_key_exists("cargo_name_to", $contents_arr)
			&& array_key_exists("cargo_surname_to", $contents_arr) && array_key_exists("cargo_phone_num_to", $contents_arr)
			&& array_key_exists("cargo_delivery_time", $contents_arr) && array_key_exists("cargo_packet_time", $contents_arr)
			&& array_key_exists("cargo_vehicle_id", $contents_arr) && array_key_exists("cargo_payment_id", $contents_arr)
			&& array_key_exists("cargo_row_status", $contents_arr)
		) {
			if (trim($contents_arr["cargo_user_id"]) != "" && trim($contents_arr["cargo_description"]) != ""
				&& trim($contents_arr["cargo_weight"]) != "" && trim($contents_arr["cargo_weight_unit"]) != ""
				&& trim($contents_arr["cargo_volume"]) != "" && trim($contents_arr["cargo_price"]) != ""
				&& trim($contents_arr["cargo_address_to"]) != "" && trim($contents_arr["cargo_name_to"]) != ""
				&& trim($contents_arr["cargo_surname_to"]) != "" && trim($contents_arr["cargo_phone_num_to"]) != ""
				&& trim($contents_arr["cargo_delivery_time"]) != "" && trim($contents_arr["cargo_packet_time"]) != ""
				&& trim($contents_arr["cargo_vehicle_id"]) != "" && trim($contents_arr["cargo_payment_id"]) != ""
				&& trim($contents_arr["cargo_row_status"]) != "") {
				$this->db->insert('cargo', $contents_arr);
				if ($this->db->affected_rows > 0) {
					$return = $this->returnResult(200, "OK", null);
				} else {
					$return = $this->returnResult(400, "Bad Request", "Cannot Insert");
				}
			} else {
				$return = $this->returnResult(400, "Bad Request", "Values Cannot Be Empty");
			}
		} else {
			$return = $this->returnResult(400, "Bad Request", "Keys Not Found");
		}
		return $return;
	}

	public function saveSubscribertoDB($contents_arr)
	{
		$return = null;
		if (array_key_exists("subscriber_user_id", $contents_arr) && array_key_exists("subscriber_cargo_id", $contents_arr)) {
			if (trim($contents_arr["subscriber_user_id"]) != "" && trim($contents_arr["subscriber_cargo_id"]) != "") {
				$this->db->insert('subscriber', $contents_arr);
				if ($this->db->affected_rows > 0) {
					$return = $this->returnResult(200, "OK", null);
				} else {
					$return = $this->returnResult(400, "Bad Request", "Cannot Insert");
				}
			} else {
				$return = $this->returnResult(400, "Bad Request", "Values Cannot Be Empty");
			}
		} else {
			$return = $this->returnResult(400, "Bad Request", "Keys Not Found");
		}
		return $return;
	}
	

	private function returnResult($http_status_code, $result_data, $error)
	{
		return array(
			"http_status_code" => $http_status_code,
			"result" => $result_data,
			"error" => $error
		);
	}
}
