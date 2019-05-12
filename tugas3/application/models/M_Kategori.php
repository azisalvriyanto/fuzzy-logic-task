<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Kategori extends CI_Model {
    public function daftar() {
        $query = $this->db->select("*")->from("kategori")->order_by("kategori_id", "ASC")->get()->result_array();
        if (count($query) > 0) {
            return array(
                "status" => 200,
                "keterangan" => $query
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Daftar kategori tidak ditemukan."
            );
        }
    }

    public function lihat(
        $id
    ) {
        $query = $this->db->select("variabel.variabel_nama, kategori.*")->from("kategori")
        ->join("variabel", "variabel.variabel_id=kategori.kategori_variabel")
        ->where("kategori_variabel", $id)
        ->order_by("kategori_id", "ASC")
        ->get()->result_array();
        if (count($query) > 0) {
            return array(
                "status" => 200,
                "keterangan" => $query
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Variabel tidak ditemukan."
            );
        }
    }
}