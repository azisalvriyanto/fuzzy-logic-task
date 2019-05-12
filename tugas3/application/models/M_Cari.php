<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Cari extends CI_Model {
    public function cari(
        $operasi,
        $kategori
    ) {
        $where = array();
        foreach ($kategori as $kategori_key => $kategori_value) {
            array_push($where, $kategori_value);
        }

        if ($operasi === "1") {
            $query = $this->db->select("variabel.variabel_nama, data.data_nama, kategori.kategori_nama, keanggotaan.keanggotaan_data, keanggotaan.keanggotaan_nilai")
            ->from("keanggotaan")
            ->join("variabel", "variabel.variabel_id=keanggotaan.keanggotaan_variabel")
            ->join("data", "data.data_id=keanggotaan.keanggotaan_data")
            ->join("kategori", "kategori.kategori_id=keanggotaan.keanggotaan_kategori")
            ->where_in("keanggotaan_kategori", $where)
            ->order_by("keanggotaan_data", "ASC")
            ->order_by("keanggotaan_variabel", "ASC")
            ->get()->result_array();
        } else if ($operasi === "2") {
            $query = $this->db->select("variabel.variabel_nama, data.data_nama, kategori.kategori_nama, keanggotaan.keanggotaan_data, keanggotaan.keanggotaan_nilai")
            ->from("keanggotaan")
            ->join("variabel", "variabel.variabel_id=keanggotaan.keanggotaan_variabel")
            ->join("data", "data.data_id=keanggotaan.keanggotaan_data")
            ->join("kategori", "kategori.kategori_id=keanggotaan.keanggotaan_kategori")
            ->where_in("keanggotaan_kategori", $where)
            ->where_not_in("keanggotaan_nilai", array("0"))
            ->order_by("keanggotaan_data", "ASC")
            ->order_by("keanggotaan_variabel", "ASC")
            ->get()->result_array();
        }

        if (count($query) > 0) {
            return array(
                "status" => 200,
                "keterangan" => $query
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Daftar data tidak ditemukan."
            );
        }
    }
}