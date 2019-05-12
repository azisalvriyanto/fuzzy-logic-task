<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Variabel extends CI_Controller {
	public function daftar()
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if (
			$method === "GET"
		) {
			$response = $this->M_Variabel->daftar();
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
			$response = $this->M_Variabel->lihat($this->input->post("id"));
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
			&& !empty($this->input->post("kategori[]"))
			&& !empty($this->input->post("awal[]"))
			&& !empty($this->input->post("tengahw[]"))
			&& !empty($this->input->post("tengahk[]"))
			&& !empty($this->input->post("akhir[]"))
		) {
			$response = $this->M_Variabel->tambah(
				$this->input->post("nama"),
				$this->input->post("kategori[]"),
				$this->input->post("awal[]"),
				$this->input->post("tengahw[]"),
				$this->input->post("tengahk[]"),
				$this->input->post("akhir[]")
			);
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
			&& !empty($this->input->post("kategori[]"))
			&& !empty($this->input->post("awal[]"))
			&& !empty($this->input->post("tengahw[]"))
			&& !empty($this->input->post("tengahk[]"))
			&& !empty($this->input->post("akhir[]"))
		) {
			$response = $this->M_Variabel->perbarui(
				$this->input->post("id"),
				$this->input->post("nama"),
				$this->input->post("kategori[]"),
				$this->input->post("awal[]"),
				$this->input->post("tengahw[]"),
				$this->input->post("tengahk[]"),
				$this->input->post("akhir[]")
			);
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
			$response = $this->M_Variabel->hapus($this->input->post("id"));
      		json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
	}
}