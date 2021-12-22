<?php
class GetFromDb extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserfromDB($contents_arr)
	{
		/*$return = null;
		$return = $this->db->get('user')->result();
		return $return;*/
	}

	public function getCargofromDb($contents_arr)
	{
		$return = null;
		$result = $this->db->get('cargo');
		if($result->num_rows() > 0){
			$return = $this->returnResult(200,$result->result(),null);
		} else {
			$return = $this->returnResult(404,null,"Not Found");
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
