<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Pendahuluan extends CI_Model {
    public function publik($menu) {
        $data = array(
            "menu" => array(
                "judul" => $menu["judul"]
            )
        );

        return $data;
    }

    public function administrator($menu, $username) {
        $data = array(
            "menu" => array(
                "judul" => $menu["judul"],
                "judul_sub" => $menu["judul_sub"]
            )
        );

        $pengguna = $this->db->select("*")->from("pengguna")
        ->where("pengguna_username", $username)->limit(1)->get();
        if ($pengguna->num_rows() > 0 && $pengguna = $pengguna->row()) {
            $data = @array_merge($data,
                array(
                    "pengguna" => array(
                        "username" => $pengguna->pengguna_username,
                        "nama" => $pengguna->pengguna_nama
                    )
                )
            );
        } else {
            $data = @array_merge($data,
                array(
                    "pengguna" => array(
                        "username" => "",
                        "nama" => ""
                    )
                )
            );
        }

        return $data;
    }
}