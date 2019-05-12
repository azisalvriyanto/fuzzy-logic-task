<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Cari extends CI_Controller {
	public function index()
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if (
			$method === "POST"
			&& !empty($this->input->post("operasi")) && is_numeric($this->input->post("operasi")) === TRUE
			&& !empty($this->input->post("kategori[]"))
		) {
			$response = $this->M_Cari->cari($this->input->post("operasi"), $this->input->post("kategori[]"));
      		json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
    }
}