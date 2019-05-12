<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Data extends CI_Model {
    public function daftar() {
        $query = $this->db->select("data.data_nama, variabel.variabel_nama, data_relasi.*")
        ->from("data_relasi")
        ->join("data", "data.data_id=data_relasi.data_relasi_data")
        ->join("variabel", "variabel.variabel_id=data_relasi.data_relasi_variabel")
        ->order_by("data_relasi.data_relasi_data", "ASC")
        ->order_by("data_relasi.data_relasi_variabel", "ASC")
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
                "keterangan" => "Daftar data tidak ditemukan."
            );
        }
    }

    public function lihat(
        $id
    ) {
        $query = $this->db->select("data.data_nama, data_relasi.*")
        ->from("data_relasi")
        ->join("data", "data.data_id=data_relasi.data_relasi_data")
        ->where("data_relasi_variabel", $id)
        ->order_by("data_relasi.data_relasi_data", "ASC")
        ->order_by("data_relasi.data_relasi_variabel", "ASC")
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
                "keterangan" => "Daftar data tidak ditemukan."
            );
        }
    }

    public function tambah(
        $nama,
        $nilai
    ) {
        $variabel = $this->db->select("*")->from("variabel")
        ->order_by("variabel_id", "ASC")
        ->get()->result_array();

        $this->db->trans_begin();
        $this->db->insert("data",
            array(
                "data_nama" => $nama
            )
        );
        $data = $this->db->insert_id();

        if (count($nilai)>0) {
            foreach ($nilai as $key => $value) {
                if (!empty($value)) {
                    $value  = $value;
                } else {
                    $value  = "0";
                }

                $this->db->insert("data_relasi",
                    array(
                        "data_relasi_data" => $data,
                        "data_relasi_variabel" => $key,
                        "data_relasi_nilai" => $value,
                    )
                );
            }
        }

        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();

            return array(
                "status" => 200,
                "keterangan" => "Data \"".$nama."\" berhasil ditambahkan."
            );
        } else {
            $this->db->trans_rollback();

            return array(
                "status" => 204,
                "keterangan" => "Data \"".$nama."\" gagal ditambahkan."
            );
        }
    }

    public function perbarui(
        $id,
        $nama
    ) {
        $query = $this->db->where("data_id", $id)->update("data",
            array(
                "data_nama" => $nama
            )
        );
        if ($query) {
            return array(
                "status" => 200,
                "keterangan" => "Data berhasil diperbarui."
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Data gagal diperbarui."
            );
        }
    }

    public function perbarui_var(
        $id,
        $nilai
    ) {
        $query = $this->db->where("data_relasi_id", $id)->update("data_relasi",
            array(
                "data_relasi_nilai" => $nilai
            )
        );
        if ($query) {
            return array(
                "status" => 200,
                "keterangan" => "Data berhasil diperbarui."
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Data gagal diperbarui."
            );
        }
    }

    public function hapus($id)
    {
        $query = $this->db->where("data_id", $id)->delete("data");
        if ($query) {
            return array(
                "status" => 200,
                "keterangan" => "Data berhasil dihapus."
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Data gagal dihapus."
            );
        }
    }
}