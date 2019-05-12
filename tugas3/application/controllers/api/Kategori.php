<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Kategori extends CI_Controller {
	public function daftar()
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if (
			$method === "GET"
		) {
			$response = $this->M_Kategori->daftar();
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
			$response = $this->M_Kategori->lihat($this->input->post("id"));
      		json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
    }
}