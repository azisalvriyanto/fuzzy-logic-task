<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Galat extends CI_Controller {
	public function _404() {
		if(strpos($_SERVER["PHP_SELF"],"/administrator/") && $this->session->userdata("username")) {
            $menu = array(
                "judul" => "404 Not Found",
                "judul_sub" => ""
            );
            $data  = $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

			$this->load->view("galat/administrator", $data);
        } else {
			redirect("beranda");
        }
	}
}