<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_Administrator extends CI_Controller {
	public function __construct() {
		parent::__construct();
		administrator();
	}

	public function beranda()
	{
		$menu = array(
			"judul" => "Beranda",
			"judul_sub" => "Keterangan"
		);
		$data  = $this->M_Pendahuluan->administrator($menu, "azisalvriyanto");

		$this->load->view("administrator/beranda", $data);
	}

	public function variabel()
	{
		$menu = array(
			"judul" => "Variabel",
			"judul_sub" => "Daftar"
		);
    	$data  = $this->M_Pendahuluan->administrator($menu, "azisalvriyanto");

		$this->load->view("administrator/variabel", $data);
	}

	public function data()
	{
		$menu = array(
			"judul" => "Data",
			"judul_sub" => "Daftar"
		);
		$data  = $this->M_Pendahuluan->administrator($menu, "azisalvriyanto");

		$this->load->view("administrator/data", $data);
	}

	public function keanggotaan()
	{
		$menu = array(
			"judul" => "Keanggotaan",
			"judul_sub" => "Daftar"
		);
		$data  = $this->M_Pendahuluan->administrator($menu, "azisalvriyanto");

		$this->load->view("administrator/keanggotaan", $data);
	}

	public function hitung()
	{
		$menu = array(
			"judul" => "Hitung",
			"judul_sub" => "Data"
		);
		$data  = $this->M_Pendahuluan->administrator($menu, "azisalvriyanto");

		$this->load->view("administrator/hitung", $data);
	}
}