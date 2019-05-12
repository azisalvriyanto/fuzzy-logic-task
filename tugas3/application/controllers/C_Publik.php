<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_Publik extends CI_Controller {
	public function beranda() {
        $this->load->view("publik/beranda");
    }
}