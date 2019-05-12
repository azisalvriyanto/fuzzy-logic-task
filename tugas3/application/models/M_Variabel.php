<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Variabel extends CI_Model {
    public function daftar() {
        $query = $this->db->select("*")->from("variabel")->order_by("variabel_id", "ASC")->get()->result_array();
        if (count($query) > 0) {
            return array(
                "status" => 200,
                "keterangan" => $query
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Daftar variabel tidak ditemukan."
            );
        }
    }

    public function lihat(
        $id
    ) {
        $variabel = $this->db->select("*")->from("variabel")->where("variabel_id", $id)->get();
        $kategori = $this->db->select("*")->from("kategori")->where("kategori_variabel", $id)
        ->order_by("kategori_id", "ASC")->get()->result_array();
        if ($variabel->num_rows() > 0 && count($kategori) > 0) {
            $data["variabel"]["id"]     = $variabel->row()->variabel_id;
            $data["variabel"]["nama"]   = $variabel->row()->variabel_nama;
            for ($i=0; $i<count($kategori); $i++) {
                $data["kategori"][$i]["id"] = $kategori[$i]["kategori_id"];
                $data["kategori"][$i]["nama"] = $kategori[$i]["kategori_nama"];
                $nilai = $this->db->select("variabel_relasi_nilai")->from("variabel_relasi")
                ->where("variabel_relasi_variabel", $variabel->row()->variabel_id)
                ->where("variabel_relasi_kategori", $kategori[$i]["kategori_id"])
                ->order_by("variabel_relasi_derajat", "ASC")
                ->get()->result_array();
                for ($j=0; $j<count($nilai) ; $j++) {
                    $data["kategori"][$i]["nilai"][$j] = $nilai[$j]["variabel_relasi_nilai"];
                }
            }

            return array(
                "status" => 200,
                "keterangan" => $data
            );
        } else {
            return array(
                "status" => 204,
                "keterangan" => "Variabel tidak ditemukan."
            );
        }
    }

    public function tambah(
        $nama,
        $kategori_s,
        $awal,
        $tengahw,
        $tengahk,
        $akhir
    ) {
        $this->db->trans_begin();
        $this->db->insert("variabel",
            array(
                "variabel_nama" => $nama
            )
        );
        $variabel = $this->db->insert_id();

        foreach ($kategori_s as $key => $kategori) {
            $this->db->insert("kategori",
                array(
                    "kategori_variabel" => $variabel,
                    "kategori_nama" => $kategori
                )
            );
        }

        $kategori = $this->db->select("kategori_id")->from("kategori")
        ->where("kategori_variabel", $variabel)
        ->order_by("kategori_id", "ASC")
        ->get()->result_array();
        $derajat = $this->db->select("derajat_id")->from("derajat")
        ->order_by("derajat_id", "ASC")
        ->get()->result_array();
        for ($i=0; $i<count($kategori); $i++) { 
            for ($j=0; $j<count($derajat); $j++) { 
                if (($j+1)%4 === 1) {
                    $nilai = $awal[$i];
                }
                else if (($j+1)%4 === 2) {
                    $nilai = $tengahw[$i];
                }
                else if (($j+1)%4 === 3) {
                    $nilai = $tengahk[$i];
                }
                else if (($j+1)%4 === 0) {
                    $nilai = $akhir[$i];
                } else {
                    $nilai = "0";
                }

                $this->db->insert("variabel_relasi",
                    array(
                        "variabel_relasi_variabel" => $variabel,
                        "variabel_relasi_kategori" => $kategori[$i]["kategori_id"],
                        "variabel_relasi_derajat" => $derajat[$j]["derajat_id"],
                        "variabel_relasi_nilai" => $nilai,
                    )
                );
            }
        }

        $data = $this->db->select("*")->from("data")
        ->order_by("data.data_id", "ASC")
        ->get()->result_array();
        if (count($data)>0) {
            for ($i=0; $i<count($data); $i++) {
                $this->db->insert("data_relasi",
                    array(
                        "data_relasi_data" => $data[$i]["data_id"],
                        "data_relasi_variabel" => $variabel,
                        "data_relasi_nilai" => "0",
                    )
                );
            }
        }

        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();

            return array(
                "status" => 200,
                "keterangan" => "Variabel \"".$nama."\" berhasil ditambahkan."
            );
        } else {
            $this->db->trans_rollback();

            return array(
                "status" => 204,
                "keterangan" => "Variabel \"".$nama."\" gagal ditambahkan."
            );
        }
    }

    public function perbarui(
        $variabel,
        $nama,
        $kategorif,
        $awal,
        $tengahw,
        $tengahk,
        $akhir
    ) {
        $kategorid = $this->db->select("*")->from("kategori")
        ->where("kategori_variabel", $variabel)
        ->order_by("kategori_id", "ASC")
        ->get()->result_array();

        $this->db->trans_begin();
        $this->db->where("variabel_id", $variabel)
        ->update("variabel",
            array(
                "variabel_nama" => $nama
            )
        );

        //aksi tambah jika di form > di db
        foreach ($kategorif as $kategorif_key => $kategorif_value) {
            $status = false;
            foreach ($kategorid as $kategorid_key => $kategorid_value) {
                if ($kategorif_key === (int) $kategorid_value["kategori_id"]) {
                    $this->db->where("kategori_id", $kategorif_key)
                    ->update("kategori",
                        array(
                            "kategori_variabel" => $variabel,
                            "kategori_nama" => $kategorif_value
                        )
                    );

                    for ($dk=1; $dk<=4; $dk++) {
                        if ($dk === 1) {
                            $nilai = $awal[$kategorif_key];
                        } else if ($dk === 2) {
                            $nilai = $tengahw[$kategorif_key];
                        } else if ($dk === 3) {
                            $nilai = $tengahk[$kategorif_key];
                        } else if ($dk === 4) {
                            $nilai = $akhir[$kategorif_key];
                        } else {
                            $nilai = "0";
                        }

                        $this->db
                        ->where("variabel_relasi_variabel", $variabel)
                        ->where("variabel_relasi_kategori", $kategorif_key)
                        ->where("variabel_relasi_derajat", $dk)
                        ->update("variabel_relasi",
                            array(
                                "variabel_relasi_nilai" => $nilai
                            )
                        );
                    }

                    $status = true;
                }
            }

            if ($status === false) {
                $this->db->insert("kategori",
                    array(
                        "kategori_variabel" => $variabel,
                        "kategori_nama" => $kategorif_value
                    )
                );

                $kategori_id = $this->db->insert_id();
                for ($dk=1; $dk<=4; $dk++) {
                    $this->db->insert("variabel_relasi",
                        array(
                            "variabel_relasi_variabel" => $variabel,
                            "variabel_relasi_kategori" => $kategori_id,
                            "variabel_relasi_derajat" => $dk,
                            "variabel_relasi_nilai" => "0"
                        )
                    );
                }
            }
        }

        //aksi hapus jika di form < di db
        foreach ($kategorid as $kategorid_key => $kategorid_value) {
            $status = false;
            foreach ($kategorif as $kategorif_key => $kategorif_value) {
                if ((int) $kategorid_value["kategori_id"] === $kategorif_key) {
                    $status = true;
                }
            }

            if ($status === false) {
                $this->db->where("kategori_id", $kategorid_value["kategori_id"])->delete("kategori");
            }
        }

        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();

            return array(
                "status" => 200,
                "keterangan" => "Variabel berhasil diperbarui."
            );
        }
        else {
            $this->db->trans_commit();

            return array(
                "status" => 204,
                "keterangan" => "Variabel gagal diperbarui."
            );
        }
    }

    public function hapus($id)
    {
        $variabel = $this->db->select("variabel_id")->from("variabel")->get()->result_array();

        $this->db->trans_begin();
        if (count($variabel) === 1) {
            $this->db->empty_table("data");
        }
        $this->db->where("variabel_id", $id)->delete("variabel");

        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();

            return array(
                "status" => 200,
                "keterangan" => "Variabel berhasil dihapus."
            );
        }
        else {
            $this->db->trans_commit();

            return array(
                "status" => 204,
                "keterangan" => "Variabel gagal dihapus."
            );
        }
    }
}