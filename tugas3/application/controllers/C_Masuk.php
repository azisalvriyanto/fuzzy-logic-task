<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_Masuk extends CI_Controller {
	public function index() {
		if($this->session->userdata("username")) {
			redirect("administrator/beranda");
		} else {
			$this->load->view("administrator/masuk");
		}
  }
}