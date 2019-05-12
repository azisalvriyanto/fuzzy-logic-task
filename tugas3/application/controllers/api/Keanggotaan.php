<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Keanggotaan extends CI_Controller {
	public function index()
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if (
			$method === "POST"
		) {
			$response = $this->M_Keanggotaan->generate();
      		json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
    }
	}

	public function lihat()
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if (
			$method === "POST"
			&& !empty($this->input->post("id")) && is_numeric($this->input->post("id")) === TRUE
		) {
			$response = $this->M_Keanggotaan->lihat($this->input->post("id"));
      json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
  }
}