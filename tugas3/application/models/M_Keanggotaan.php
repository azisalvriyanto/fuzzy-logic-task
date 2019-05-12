<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Keanggotaan extends CI_Model {
    public function generate_per(
        $id
    ) {
        $this->db->where("keanggotaan_variabel", $id)->delete("keanggotaan");

        $data = $this->db->select("data.data_id, data.data_nama, data_relasi.data_relasi_data, data_relasi.data_relasi_nilai")
        ->from("data_relasi")
        ->join("data", "data.data_id=data_relasi.data_relasi_data")
        ->where("data_relasi_variabel", $id)
        ->order_by("data_relasi.data_relasi_data", "ASC")
        ->order_by("data_relasi.data_relasi_variabel", "ASC")
        ->get()->result_array();

        $kategori = $this->db->select("kategori_id, kategori_nama")
        ->from("kategori")
        ->where("kategori_variabel", $id)
        ->order_by("kategori_id", "ASC")
        ->get()->result_array();

        $variabel = $this->db->select("variabel_relasi_kategori, variabel_relasi_derajat, variabel_relasi_nilai")
        ->from("variabel_relasi")
        ->where("variabel_relasi_variabel", $id)
        ->order_by("variabel_relasi_kategori", "ASC")
        ->order_by("variabel_relasi_derajat", "ASC")
        ->get()->result_array();

        $keterangan_array = array();
        for ($i=0; $i<count($data); $i++) {
            $nilai = (int) $data[$i]["data_relasi_nilai"];
            $k=0;
            if ($nilai < $variabel[2]["variabel_relasi_nilai"] || $nilai > $variabel[count($variabel)-3]["variabel_relasi_nilai"]) {
                if ($nilai < $variabel[2]["variabel_relasi_nilai"]) {
                    $keterangan_array[$data[$i]["data_id"]][$k] = array(
                        "kategori" => $variabel[3]["variabel_relasi_kategori"],
                        "keanggotaan" => array(
                            $variabel[2]["variabel_relasi_derajat"] => $variabel[2]["variabel_relasi_nilai"],
                            $variabel[2]["variabel_relasi_derajat"] => $variabel[2]["variabel_relasi_nilai"],
                        )
                    );
                } else {
                    $keterangan_array[$data[$i]["data_id"]][$k] = array(
                        "kategori" => $variabel[count($variabel)-3]["variabel_relasi_kategori"],
                        "keanggotaan" => array(
                            $variabel[count($variabel)-3]["variabel_relasi_derajat"] => $variabel[count($variabel)-3]["variabel_relasi_nilai"],
                            $variabel[count($variabel)-3]["variabel_relasi_derajat"] => $variabel[count($variabel)-3]["variabel_relasi_nilai"]
                        )
                    );
                }   
            }
            else {
                for ($j=0; $j<count($variabel)-1; $j++) {
                    if ($variabel[$j]["variabel_relasi_nilai"] !== "" && $variabel[$j+1]["variabel_relasi_nilai"] !== "") {
                        if (
                            (int) $variabel[$j]["variabel_relasi_nilai"] <= $nilai
                            && $nilai <= (int) $variabel[$j+1]["variabel_relasi_nilai"]
                        ) {
                            $keterangan_array[$data[$i]["data_id"]][$k] = array(
                                "kategori" => $variabel[$j]["variabel_relasi_kategori"],
                                "keanggotaan" => array(
                                    $variabel[$j]["variabel_relasi_derajat"] => $variabel[$j]["variabel_relasi_nilai"],
                                    $variabel[$j+1]["variabel_relasi_derajat"] => $variabel[$j+1]["variabel_relasi_nilai"]
                                )
                            );
                            $k++;
                        }
                    }
                }
            }
        }

        foreach ($data as  $value_data) {
            foreach ($kategori as $value_kategori) {
                $hasil[$value_data["data_id"]][$value_kategori["kategori_id"]] = 0;
            }
        }

        $y=0;
        foreach ($keterangan_array as $data_id => $value_keterangan_array) {
            $nilai = (int) $data[$y]["data_relasi_nilai"];
            for ($i=0; $i<count($value_keterangan_array); $i++) {
                $z = 0;
                foreach ($value_keterangan_array[$i]["keanggotaan"] as $derajat_id => $value_value_keterangan_array) {
                    $tampung_derajat[$z] = $derajat_id;
                    $tampung_value[$z] = $value_value_keterangan_array;
                    $z++;
                }

                if ($tampung_derajat[0] === 1 && $tampung_derajat[1] === 2) {
                    $hasil[$data_id][$value_keterangan_array[$i]["kategori"]] = ($nilai - $tampung_value[0])/($tampung_value[1] - $tampung_value[0]);
                }
                else if ($tampung_derajat[0] === 2 && $tampung_derajat[1] === 3) {
                    $hasil[$data_id][$value_keterangan_array[$i]["kategori"]] = 1;
                }
                else if ($tampung_derajat[0] === 3 && $tampung_derajat[1] === 4) {
                    $hasil[$data_id][$value_keterangan_array[$i]["kategori"]] = ($tampung_value[1] - $nilai)/($tampung_value[1] - $tampung_value[0]);
                }
                else {
                    $hasil[$data_id][$value_keterangan_array[$i]["kategori"]] = 1;
                }
            }
            $y++;
        }

        $this->db->trans_begin();
        foreach ($hasil as $data_key => $hasil_value) {
            foreach ($hasil_value as $kategori_key => $kategori_value) {
                $this->db->insert("keanggotaan",
                    array(
                        "keanggotaan_variabel" => $id,
                        "keanggotaan_data" => $data_key,
                        "keanggotaan_kategori" => $kategori_key,
                        "keanggotaan_nilai" => $kategori_value
                    )
                );
            }
        }

        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();

            return array(
                "status" => 200,
                "keterangan" => "Daftar keanggotaan berhasil direka ulang."
            );
        }
        else {
            $this->db->trans_rollback();

            return array(
                "status" => 403,
                "keterangan" => "Daftar keanggotaan gagal direka ulang."
            );
        }
    }

    public function lihat(
        $id
    ) {
        $keanggotaan = $this->db->select("variabel.variabel_nama, data.data_nama, kategori.kategori_nama, keanggotaan.keanggotaan_data, keanggotaan.keanggotaan_nilai")
        ->from("keanggotaan")
        ->join("variabel", "variabel.variabel_id=keanggotaan.keanggotaan_variabel")
        ->join("data", "data.data_id=keanggotaan.keanggotaan_data")
        ->join("kategori", "kategori.kategori_id=keanggotaan.keanggotaan_kategori")
        ->where("keanggotaan_variabel", $id)
        ->order_by("keanggotaan_variabel", "ASC")
        ->order_by("keanggotaan_data", "ASC")
        ->order_by("keanggotaan_kategori", "ASC")
        ->get()->result_array();

        if (count($keanggotaan) > 0) {
            return array(
                "status" => 200,
                "keterangan" => $keanggotaan
            );
        }
        else {
            $this->db->trans_rollback();

            return array(
                "status" => 204,
                "keterangan" => "Daftar keanggotaan tidak ditemukan."
            );
        }
    }

    public function generate() {
        $variabel = $this->db->select("variabel_id")
        ->from("variabel")
        ->get()->result_array();
        
        if (count($variabel) > 0) {
            foreach ($variabel as $key => $value) {
                $generate = $this->M_Keanggotaan->generate_per($value["variabel_id"]);
                if ($generate["status"] === 403) {
                    return array(
                        "status" => 204,
                        "keterangan" => "Daftar keanggotaan berhasil direka ulang."
                    );
                }
            }

            return array(
                "status" => 200,
                "keterangan" => "Daftar keanggotaan berhasil direka ulang."
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Daftar variabel tidak ditemukan."
            );
        }
    }
}