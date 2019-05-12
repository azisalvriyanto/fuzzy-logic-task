<?php
function administrator() {
    $_this = get_instance();
    if (!$_this->session->userdata("username")) {
        redirect("administrator");
    } else {
        $username = $_this->session->userdata("username");
        $pengguna = $_this->db->select("pengguna_username, pengguna_nama")->from("pengguna")
        ->where("pengguna_username", $username)->get();
        if ($pengguna->num_rows() > 0) {
            $menu = @strtolower(end($_this->uri->segments));
            if (
                $menu !== "beranda"
                && $menu !== "variabel"
                && $menu !== "data"
                && $menu !== "keanggotaan"
                && $menu !== "hitung"
            ) {
                $_menu = array(
                    "judul" => "404 Not Found",
                    "judul_sub" => ""
                );

                $data  = $_this->M_Pendahuluan->administrator($_menu, $_this->session->userdata("username"));
    
                $_this->load->view("galat/administrator", $data);
            }
        } else {
            $_this->session->unset_userdata("username");
            redirect("administrator");
        }
    }
}