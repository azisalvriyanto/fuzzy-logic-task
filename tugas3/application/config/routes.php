<?php
defined("BASEPATH") OR exit("No direct script access allowed");

$route["default_controller"]    = "C_Publik/beranda";
$route["404_override"]          = "";
$route["translate_uri_dashes"]  = FALSE;

//Administrator
$route["administrator"]  = "C_Masuk/index";
$route["administrator/beranda"] = "C_Administrator/beranda";
$route["administrator/variabel"]        = "C_Administrator/variabel";
$route["administrator/variabel/tambah"] = "C_Administrator/variabel_tambah";
$route["administrator/variabel/(:num)"] = "C_Administrator/variabel_sunting/$1";
$route["administrator/data"]    = "C_Administrator/data";
$route["administrator/keanggotaan"]  = "C_Administrator/keanggotaan";
$route["administrator/hitung"]  = "C_Administrator/hitung";

//API
$route["api"]   = "api/Awal/index";
$route["api/masuk"]     = "api/Otentikasi/masuk";
$route["api/keluar"]    = "api/Otentikasi/keluar";

$route["api/variabel"]          = "api/Variabel/daftar";
$route["api/variabel/lihat"]    = "api/Variabel/lihat";
$route["api/variabel/tambah"]   = "api/Variabel/tambah";
$route["api/variabel/hapus"]    = "api/Variabel/hapus";

$route["api/data"]              = "api/Data/daftar";
$route["api/data/tambah"]       = "api/Data/tambah";
$route["api/data/hapus"]        = "api/Data/hapus";
$route["api/data/perbarui"]     = "api/Data/perbarui";
$route["api/data/perbarui_var"] = "api/Data/perbarui_var";

$route["api/kategori"]          = "api/Kategori/daftar";
$route["api/kategori/lihat"]    = "api/Kategori/lihat";

$route["api/keanggotaan"]       = "api/Keanggotaan/index";
$route["api/keanggotaan/lihat"] = "api/Keanggotaan/lihat";

$route["api/cari"]  = "api/Cari/index";