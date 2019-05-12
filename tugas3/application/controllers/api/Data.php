<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Data extends CI_Controller {
	public function daftar()
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if (
			$method === "GET"
		) {
			$response = $this->M_Data->daftar();
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
			$response = $this->M_Data->lihat($this->input->post("id"));
      		json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
	}

	public function tambah()
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if (
			$method === "POST"
			&& !empty($this->input->post("nama")) && is_string($this->input->post("nama")) === TRUE
			&& !empty($this->input->post("nilai[]"))
		) {
			$response = $this->M_Data->tambah($this->input->post("nama"), $this->input->post("nilai[]"));
      		json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
	}

	public function perbarui()
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if (
			$method === "POST"
			&& !empty($this->input->post("id")) && is_numeric($this->input->post("id")) === TRUE
			&& !empty($this->input->post("nama")) && is_string($this->input->post("nama")) === TRUE
		) {
			$response = $this->M_Data->perbarui($this->input->post("id"), $this->input->post("nama"));
      		json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
	}

	public function perbarui_var()
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if (
			$method === "POST"
			&& !empty($this->input->post("id")) && is_numeric($this->input->post("id")) === TRUE
			&& !empty($this->input->post("nilai")) && is_string($this->input->post("nilai")) === TRUE
		) {
			$response = $this->M_Data->perbarui_var($this->input->post("id"), $this->input->post("nilai"));
      		json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
	}

	public function hapus()
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if (
			$method === "POST"
			&& !empty($this->input->post("id")) && is_numeric($this->input->post("id")) === TRUE
		) {
			$response = $this->M_Data->hapus($this->input->post("id"));
      		json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
	}
}