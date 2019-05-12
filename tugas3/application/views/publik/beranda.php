<?php
    defined("BASEPATH") OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Logika Fuzzy</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">

<link href="<?= base_url("assets/publik/") ?>img/favicon.png" rel="icon">
<link href="<?= base_url("assets/publik/") ?>img/apple-touch-icon.png" rel="apple-touch-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

<link href="<?= base_url("assets/publik/") ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="<?= base_url("assets/publik/") ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="<?= base_url("assets/publik/") ?>lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
<link href="<?= base_url("assets/publik/") ?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?= base_url("assets/publik/") ?>lib/animate/animate.min.css" rel="stylesheet">
<link href="<?= base_url("assets/publik/") ?>lib/modal-video/css/modal-video.min.css" rel="stylesheet">

<link href="<?= base_url("assets/publik/") ?>css/style.css" rel="stylesheet">
</head>

<body>
    <section id="hero" class="wow fadeIn">
        <div class="hero-container">
        <h1>Kelayakan Sertifikasi Guru</h1>
        <h2>Logika Fuzzy</h2>
        <a href="#testimonials" class="btn-get-started scrollto">Pendahuluan</a>
        <a href="#blog" class="btn-get-started scrollto">Kelompok</a>
        </div>
    </section><!-- #hero -->

    <section id="testimonials" class="padd-section text-center wow fadeInUp">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="testimonials-content">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item  active">
                    <div class="top-top">
                        <h2>Abstrak</h2>
                        <p>Dalam penetapan sertifikasi guru tahun 2012 yang sesuai dengan Peraturan Menteri Nomor 74 tahun 2008 tentang pemberian sertifikat pendidik kepada guru dan dosen, ditetapkan tahap-tahap dalam menyeleksi guru yang layak disertifikasi. Dalam kenyataannya proses seleksi ini masih banyak menemui kendala terutama masalah keakuratan data hasil penyeleksian awal.</p>
                    </div>
                    </div>

                    <div class="carousel-item ">
                    <div class="top-top">
                        <h2>Abstrak</h2>
                        <p> Dalam hal ini dibuatlah sebuah pemodelan fuzzy logic untuk dapat menyeleksi guru yang berhak disertifikasi. Sistem ini dibuat menggunakan rule-rule yang saling mendukung keputusan. Tujuan utama dari pembuatan pemodelan ini supaya dapat memecahkan masalah dalam menetapkan sertifikasi guru. Adapun variabel yang digunakan dalam pembuatan pemodelan fuzzy logic ini adalah pendidikan, usia, masa kerja, dan golongan. </p>
                    </div>
                    </div>

                    <div class="carousel-item ">
                    <div class="top-top">
                        <h2>Abstrak</h2>
                        <p> Variabelvariabel tersebut diolah dengan memasukkan rule-rule yang memungkinkan untuk dapat membuat keputusan yang cepat dan akurat, agar proses seleksi guru yang berhak disertifikasi dapat berjalan dengan baik dan lancar.</p>
                    </div>
                    </div>
                </div>

                <div class="btm-btm">
                    <ul class="list-unstyled carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
        </div>
        
        <br><br>
        <a href="#aturan" class="btn-get-started scrollto"><h3>aturan</h3></a>
        </div>
    </section>



    <section id="aturan" class="padd-section text-center wow fadeInUp">
        <div class="container">
        <div class="section-title text-center">
            <h2>Aturan</h2>
        </div>
        </div>

        <div class="container">
        <div class="row">
            <table class="table mb-0" id="aturan_table">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">Nama</th>
                    </tr>
                </thead>
                <tbody id="aturan_tbody">
                </tbody>
            </table>
        </div>

        <br><br>
        <a href="#data" class="btn-get-started scrollto"><h3>data</h3></a>
        </div>
    </section>


    <section id="data"></section>
    <section id="contact" class="padd-section wow fadeInUp">
        <div class="container">
            <div class="section-title text-center">
                <h2>Data</h2>
            </div>
        </div>

        <div hidden="true">
            <form id="data_form-tambah">
                <div class="form-group">
                    <label for="nama">Nama Data</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama data" value="">
                </div>
                <div class="form-row">
                </div>
            </form>
        </div>

        <div class="container">
                <button type="button" class="btn btn-accent" id="data_tambah">
                    <i class="fas fa-user-plus mr-1"></i>
                    Tambah Data
                </button>
            <div class="row justify-content-center">
                <table class="table mb-0" id="data_table">
                    <thead class="bg-light">
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <br><br>
        <center><a href="#masukkan" class="btn-get-started scrollto"><h3>masukkan</h3></a></center>
    </section>


    <section id="masukkan" class="padd-section text-center wow fadeInUp">
        <div class="container">
            <div class="section-title text-center">
                <h2>Masukkan</h2>
            </div>
        </div>

        <div class="container">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <div class="form-row">
                            <div class="col-md-3 mt-2 mb-2">
                                <h6 class="m-0">Daftar Keanggotaan</h6>
                            </div>
                            <div class="col-md-4 pt-1 text-center">
                                <select id="dk_variabel" class="form-control">
                                    <option>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-md-5 pt-1 text-center">
                                <button type="button" class="btn btn-accent col-md-12" id="dk_generate">
                                    <i class="fas fa-user-plus mr-1"></i>
                                    Reka Ulang Data
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                        <div id="derajatkeanggotaan"></div>
                        <table class="table mb-0" id="dk_table">
                            <thead class="bg-light">
                                <tr>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <br><br><a href="#eksekusi" class="btn-get-started scrollto"><h3>pengaturan</h3></a>
        </div>
    </section>



    <section id="eksekusi" class="padd-section text-center wow fadeInUp">
        <div class="container">
            <div class="section-title text-center">
                <h2>Eksekusi</h2>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                            <form id="hasil_form">
                                <div class="form-row">
                                    <div class="col-md-4 pt-1 text-center" id="hasil_daftar_variabel"></div>
                                    <div class="form-row col-md-8 pt-1 text-center d-flex align-items-center">
                                        <div class="form-group col-md-12">
                                            <select class="form-control" id="operasi" name="operasi">
                                                <option value="">Pilih... (operasi)</option>
                                                <option value="1">OR</option>
                                                <option value="2">AND</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <a href="#hasil" class="btn-get-started scrollto">
                                                <button type="button" class="btn btn-accent col-md-12" id="hasil_cari">
                                                    <i class="fas fa-user-plus mr-1"></i>
                                                    Cari
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="hasil" class="padd-section text-center wow fadeInUp">
        <div class="container">
        <div class="section-title text-center">
            <h2>Kesimpulan</h2>
        </div>
        </div>

        <div class="container">
            <div class="row">
                <table class="table mb-0" id="hasil_table">
                    <thead class="bg-light">
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    

    <section id="blog" class="padd-section wow fadeInUp">
        <div class="container">
            <div class="section-title text-center">
                <h2>Kelompok</h2>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-4">
                <div class="block-blog text-left">
                    <a href="#"><img src="<?= base_url("assets/publik/") ?>img/blog/blog-image-1.jpg" alt="img"></a>
                    <div class="content-blog">
                    <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
                    <span>05, juin 2017</span>
                    <a class="pull-right readmore" href="#">read more</a>
                    </div>
                </div>
                </div>

                <div class="col-md-6 col-lg-4">
                <div class="block-blog text-left">
                    <a href="#"><img src="<?= base_url("assets/publik/") ?>img/blog/blog-image-2.jpg" class="img-responsive" alt="img"></a>
                    <div class="content-blog">
                    <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
                    <span>05, juin 2017</span>
                    <a class="pull-right readmore" href="#">read more</a>
                    </div>
                </div>
                </div>

                <div class="col-md-6 col-lg-4">
                <div class="block-blog text-left">
                    <a href="#"><img src="<?= base_url("assets/publik/") ?>img/blog/blog-image-3.jpg" class="img-responsive" alt="img"></a>
                    <div class="content-blog">
                    <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
                    <span>05, juin 2017</span>
                    <a class="pull-right readmore" href="#">https://facebook.com/tegal6etar</a>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </section>

    <section id="newsletter" class="newsletter text-center wow fadeInUp">
        <div class="overlay padd-section">
        <div class="container">

            <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6">
                <form class="form-inline" method="POST" action="#">

                <input type="email" class="form-control " placeholder="Email Adress" name="email">
                <button type="submit" class="btn btn-default"><i class="fa fa-location-arrow"></i>Subscribe</button>

                </form>

            </div>
            </div>

            <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>


        </div>
        </div>
    </section>

    <!--==========================
        Contact Section
    ============================-->
    <section id="contact" class="padd-section wow fadeInUp">

        <div class="container">
        <div class="section-title text-center">
            <h2>Temui Kami</h2>
            <p class="separator">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        </div>

        <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-3 col-md-4">

            <div class="info">
                <div>
                <i class="fa fa-map-marker"></i>
                <p>Gang Meranti, Nomor 151B, Janti,<br>Sleman, D.I Yogyakarta 55281</p>
                </div>

                <div class="email">
                <i class="fa fa-envelope"></i>
                <p>aalvriyato@gmail.com</p>
                </div>

                <div>
                <i class="fa fa-phone"></i>
                <p>+62 8 2350 95 2330</p>
                </div>
            </div>

            <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

            </div>

            <div class="col-lg-5 col-md-8">
            <div class="form">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <script src="<?= base_url("assets/publik/") ?>lib/jquery/jquery.min.js"></script>
    <script src="<?= base_url("assets/publik/") ?>lib/jquery/jquery-migrate.min.js"></script>
    <script src="<?= base_url("assets/publik/") ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url("assets/publik/") ?>lib/superfish/hoverIntent.js"></script>
    <script src="<?= base_url("assets/publik/") ?>lib/superfish/superfish.min.js"></script>
    <script src="<?= base_url("assets/publik/") ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url("assets/publik/") ?>lib/modal-video/js/modal-video.js"></script>
    <script src="<?= base_url("assets/publik/") ?>lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url("assets/publik/") ?>lib/wow/wow.min.js"></script>

    <script src="<?= base_url("assets/publik/") ?>contactform/contactform.js"></script>

    <script src="<?= base_url("assets/publik/") ?>js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            daftar_aturan();
            daftar_data();
            daftar_variabel();
            daftar_kategori();

            $("#data_tambah").click(function() {
                swal({
                    title: "Tambah Data",
                    content: $("#data_form-tambah")[0],
                    buttons: [
                        true,
                        {
                            text: "Tambah",
                            closeModal: false,
                        }
                    ],
                })
                .then((yes) => {
                    if (yes) {
                        $.ajax({
                            url: `<?= base_url("api/") ?>`+"data/tambah",
                            dataType: "json",
                            type: "POST",
                            data : new FormData($("#data_form-tambah")[0]),
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response.status === 200) {
                                    swal({
                                        title: "Data berhasil ditambahkan.",
                                        icon: "success",
                                        button: "Tutup"
                                    })
                                    .then((yes) => {
                                        location.reload();
                                    });
                                } else {
                                    swal({
                                        title: "Data gagal ditambahkan.",
                                        text: response.keterangan,
                                        icon: "error",
                                        button: "Tutup"
                                    });
                                }
                            },
                            error: function (jqXHR, exception) {
                                if (jqXHR.status === 0) {
                                    keterangan = "Not connect (verify network).";
                                } else if (jqXHR.status == 404) {
                                    keterangan = "Requested page not found.";
                                } else if (jqXHR.status == 500) {
                                    keterangan = "Internal Server Error.";
                                } else if (exception === "parsererror") {
                                    keterangan = "Requested JSON parse failed.";
                                } else if (exception === "timeout") {
                                    keterangan = "Time out error.";
                                } else if (exception === "abort") {
                                    keterangan = "Ajax request aborted.";
                                } else {
                                    keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                                }
                                $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                    <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="fa fa-info mx-2"></i>
                                    <strong>`+keterangan+`</strong>
                                </div>`);
                            }
                        });
                    }
                })
                .catch(err => {
                    if (err) {
                        swal("Oh noes!", "The AJAX request failed!", "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });
            });

            $("#dk_generate").click(function() {
                $.ajax({
                    url: `<?= base_url("api") ?>`+"/keanggotaan",
                    dataType: "json",
                    type: "POST",
                    success: function(response) {
                        if (response.status === 200) {
                            swal({
                                title: "Data berhasil direka ulang.",
                                icon: "success",
                                button: "Tutup"
                            });
                            
                        } else {
                            swal({
                                title: "Refresh halaman kembali.",
                                text: response.keterangan,
                                icon: "error",
                                button: "Tutup"
                            })
                            .then((yes) => {
                                location.reload();
                            });
                        }
                    },
                    error: function (jqXHR, exception) {
                        if (jqXHR.status === 0) {
                            keterangan = "Not connect (verify network).";
                        } else if (jqXHR.status == 404) {
                            keterangan = "Requested page not found.";
                        } else if (jqXHR.status == 500) {
                            keterangan = "Internal Server Error.";
                        } else if (exception === "parsererror") {
                            keterangan = "Requested JSON parse failed.";
                        } else if (exception === "timeout") {
                            keterangan = "Time out error.";
                        } else if (exception === "abort") {
                            keterangan = "Ajax request aborted.";
                        } else {
                            keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                        }

                        $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                            <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="fa fa-info mx-2"></i>
                            <strong>`+keterangan+`</strong>
                        </div>`);
                    }
                });
            });

            $("#dk_variabel").change(function() {
                var variabel = $(this).find(":selected").attr("value");
                $.ajax({
                    url: `<?= base_url("api") ?>`+"/kategori/lihat",
                    dataType: "json",
                    type: "POST",
                    data: {
                        id: variabel
                    },
                    success: function(response) {
                        $("#dk_table thead tr").html(``);
                        $("#dk_table tbody").html(``);

                        if (response.status === 200) {
                            let kategori = response.keterangan;

                            $("#dk_table thead tr").append(`<th scope="col" class="border-0">#</th>`);
                            $("#dk_table thead tr").append(`<th scope="col" class="border-0">Data</th>`);
                            for (let i=0; i<kategori.length; i++) {
                                $("#dk_table thead tr").append(`<th scope="col" class="border-0">`+kategori[i].kategori_nama+`</th>`);
                            }

                            $.ajax({
                                url: `<?= base_url("api") ?>`+"/keanggotaan/lihat",
                                dataType: "json",
                                type: "POST",
                                data: {
                                    id: variabel
                                },
                                success: function(response) {
                                    if (response.status === 200) {
                                        let keanggotaan = response.keterangan;
                                        let string  = "";
                                        let data_id	= "";
                                        let nomor   = 0;
                                        for (let i=0; i<keanggotaan.length; i++) {
                                            if (data_id !== keanggotaan[i].keanggotaan_data) {
                                                if (i !== 0) {
                                                    string += `\n</tr>`;
                                                }
                                                string  += `\n<tr>`;
                                                string  += `\n<td>`+(nomor = nomor+1)+`</td>`;
                                                string  += `\n<td class="text-left">`+keanggotaan[i].data_nama+`</td>`;
                                            }
                                            data_id	= keanggotaan[i].keanggotaan_data;

                                            string += `\n<td>`+keanggotaan[i].keanggotaan_nilai+`</td>`;
                                            
                                            if (i === keanggotaan.length-1) {
                                                string += `\n</tr>`;
                                            }
                                        }
                                        $("#dk_table tbody").append(string);
                                    }
                                }
                            });
                        }
                    }
                });
            });

            $("#hasil_cari").click(function() {
                $.ajax({
                    url: `<?= base_url("api") ?>`+"/cari",
                    dataType: "json",
                    type: "POST",
                    data : new FormData($("#hasil_form")[0]),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === 200) {
                            let keanggotaan = response.keterangan;
                            $.ajax({
                                url: `<?= base_url("api/") ?>`+"variabel",
                                dataType: "json",
                                type: "GET",
                                success: function(response) {
                                    if (response.status === 200) {
                                        $("#hasil_table thead tr").html(``);
                                        $("#hasil_table tbody").html(``);

                                        let variabel = response.keterangan;

                                        $("#hasil_table thead tr").append(`<th scope="col" class="border-0">#</th>`);
                                        $("#hasil_table thead tr").append(`<th scope="col" class="border-0">Nama</th>`);

                                        for (let i=0; i<variabel.length; i++) {
                                            if ($("#select_"+variabel[i].variabel_id).find(":selected").attr("value") !== "semua") {
                                                $("#hasil_table thead tr").append(`<th scope="col" class="border-0">`+variabel[i].variabel_nama+` (`+$("#select_"+variabel[i].variabel_id+" option:selected").text()+`)</th>`);
                                            }
                                        }
                                        $("#hasil_table thead tr").append(`<th scope="col" class="border-0">Rekomendasi (`+$("#operasi option:selected").text()+`)</th>`);

                                        let string  = "";
                                        let data_id	= "";
                                        let nomor   = 0;
                                        for (let i=0; i<keanggotaan.length; i++) {
                                            if (data_id !== keanggotaan[i].keanggotaan_data) {
                                                if (i !== 0) {
                                                    string += `\n</tr>`;
                                                }
                                                string  += `\n<tr>`;
                                                string  += `\n<td>`+(nomor = nomor+1)+`</td>`;
                                                string  += `\n<td class="text-left">`+keanggotaan[i].data_nama+`</td>`;
                                            }
                                            data_id	= keanggotaan[i].keanggotaan_data;

                                            string += `\n<td>`+keanggotaan[i].keanggotaan_nilai+`</td>`;

                                            if (keanggotaan.length%5 === 0 && keanggotaan.length>=10) {
                                                if ((i+1)%2 === 0) {
                                                    string += `\n<td>`+(keanggotaan[i].keanggotaan_nilai >= keanggotaan[i-1].keanggotaan_nilai ? keanggotaan[i].keanggotaan_nilai : keanggotaan[i-1].keanggotaan_nilai)+`</td>`;
                                                }
                                            } else {
                                                string += `\n<td>`+keanggotaan[i].keanggotaan_nilai+`</td>`;
                                            }

                                            if (i === keanggotaan.length-1) {
                                                string += `\n</tr>`;
                                            }
                                        }
                                        $("#hasil_table tbody").append(string);
                                    }
                                }
                            });
                        }
                    }
                });
            });
        });

        function daftar_aturan() {
            $.ajax({
                url: `<?= base_url("api/") ?>`+"variabel",
                dataType: "json",
                type: "GET",
                success: function(response) {
                    if (response.status === 200) {
                        let data = response.keterangan;
                        for (let i=0; i<data.length; i++) {
                            $("#aturan_table tbody").append(`<tr id="`+data[i].variabel_id+`">
                                            <td>`+(nomor = i+1)+`</td>
                                            <td class="text-left">`+data[i].variabel_nama+`</td>
                                        <tr>`);
                        }
                    }
                }
            });
        }

        function daftar_data() {
            $.ajax({
                url: `<?= base_url("api/") ?>`+"variabel",
                dataType: "json",
                type: "GET",
                success: function(response) {
                    if (response.status === 200) {
                        let variabel = response.keterangan;

                        $("#data_table thead tr").append(`<th scope="col" class="border-0">#</th>`);
                        $("#data_table thead tr").append(`<th scope="col" class="border-0">Nama</th>`);
                        for (let i=0; i<variabel.length; i++) {
                            $("#data_table thead tr").append(`<th scope="col" class="border-0">`+variabel[i].variabel_nama+`</th>`);
                            $("#data_form-tambah .form-row").append(`<div class="form-group `+((i%2 === 0 && i === variabel.length-1) ? "col-md-12" : "col-md-6")+`">
                                                            <label for="nilai[`+variabel[i].variabel_id+`]">Nilai `+variabel[i].variabel_nama+`</label>
                                                            <input type="number" class="form-control text-center" id="nilai[`+variabel[i].variabel_id+`]" name="nilai[`+variabel[i].variabel_id+`]" placeholder="Nilai `+variabel[i].variabel_nama+`" value="">
                                                        </div>`);
                        }
                        $("#data_table thead tr").append(`<th scope="col" class="border-0">Pengaturan</th>`);

                        $.ajax({
                            url: `<?= base_url("api/") ?>`+"data",
                            dataType: "json",
                            type: "GET",
                            success: function(response) {
                                if (response.status === 200) {
                                    let data = response.keterangan;
                                    let string  = "";
                                    let data_id	= "";
                                    let nomor   = 0;
                                    for (let i=0; i<data.length; i++) {
                                        if (data_id !== data[i].data_relasi_data) {
                                            if (i !== 0) {
                                                string += `\n<td class="text-nowrap"><button type="button" onclick="hapus(\``+data[i-1].data_relasi_data+`\`, \``+data[i-1].data_nama+`\`);" class="btn btn-sm btn-outline-danger mr-1"><i class="fas fa-trash-alt mr-1"></i> Hapus</button></td>`;
                                                string += `\n</tr>`;
                                            }
                                            string  += `\n<tr id="`+data[i].data_relasi_data+`">`;
                                            string  += `\n<td>`+(nomor = nomor+1)+`</td>`;
                                            string  += `\n<td><input type="text" class="form-control" onkeyup="nama('`+data[i].data_relasi_data+`')" placeholder="Nama data" value="`+data[i].data_nama+`" style="width: 200px;"></td>`;
                                        }
                                        data_id	= data[i].data_relasi_data;

                                        string += `\n<td><input type="number" class="form-control text-center" onkeyup="data('`+data[i].data_relasi_id+`')" placeholder="`+data[i].variabel_nama+`" value="`+data[i].data_relasi_nilai+`"></td>`;
                                        
                                        if (i === data.length-1) {
                                            string += `\n<td class="text-nowrap"><button type="button" onclick="hapus(\``+data[i].data_relasi_data+`\`, \``+data[i].data_nama+`\`);" class="btn btn-sm btn-outline-danger mr-1"><i class="fas fa-trash-alt mr-1"></i> Hapus</button></td>`;
                                            string += `\n</tr>`;
                                        }
                                    }
                                    $("#data_table tbody").append(string);
                                }
                            }
                        });
                    }
                }
            });
        }

        function nama(id) {
            $(this).on("keyup", function(e) {
                $.ajax({
                    url: `<?= base_url("api/") ?>`+"data/perbarui",
                    dataType: "json",
                    type: "POST",
                    data : {
                        "id": id,
                        "nama": e.target.value
                    },
                    success: function(response) {
                        $("#status").html(``);
                    },
                    error: function (jqXHR, exception) {
                        $("#"+id).removeClass("focus");
                        
                        if (jqXHR.status === 0) {
                            keterangan = "Not connect (verify network).";
                        } else if (jqXHR.status == 404) {
                            keterangan = "Requested page not found.";
                        } else if (jqXHR.status == 500) {
                            keterangan = "Internal Server Error.";
                        } else if (exception === "parsererror") {
                            keterangan = "Requested JSON parse failed.";
                        } else if (exception === "timeout") {
                            keterangan = "Time out error.";
                        } else if (exception === "abort") {
                            keterangan = "Ajax request aborted.";
                        } else {
                            keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                        }

                        $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                            <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="fa fa-info mx-2"></i>
                            <strong>`+keterangan+`</strong>
                        </div>`);
                    }
                });
            });
        }

        function data(id) {
            $(this).on("keyup", function(e) {
                $.ajax({
                    url: `<?= base_url("api/") ?>`+"data/perbarui_var",
                    dataType: "json",
                    type: "POST",
                    data : {
                        "id": id,
                        "nilai": e.target.value
                    },
                    success: function(response) {
                        $("#status").html(``);
                    },
                    error: function (jqXHR, exception) {
                        $("#"+id).removeClass("focus");
                        
                        if (jqXHR.status === 0) {
                            keterangan = "Not connect (verify network).";
                        } else if (jqXHR.status == 404) {
                            keterangan = "Requested page not found.";
                        } else if (jqXHR.status == 500) {
                            keterangan = "Internal Server Error.";
                        } else if (exception === "parsererror") {
                            keterangan = "Requested JSON parse failed.";
                        } else if (exception === "timeout") {
                            keterangan = "Time out error.";
                        } else if (exception === "abort") {
                            keterangan = "Ajax request aborted.";
                        } else {
                            keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                        }

                        $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                            <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="fa fa-info mx-2"></i>
                            <strong>`+keterangan+`</strong>
                        </div>`);
                    }
                });
            });
        }

        function hapus(id, nama) {
            $("#"+id).addClass("focus");

            swal({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, anda tidak dapat memulihkan data \""+nama+"\".",
                icon: "warning",
                dangerMode: true,
                buttons: [
                    true,
                    {
                        text: "Hapus",
                        closeModal: false,
                    }
                ],
            })
            .then((yes) => {
                if (yes) {
                    $.ajax({
                        url: `<?= base_url("api/") ?>`+"data/hapus",
                        dataType: "json",
                        type: "POST",
                        data : {
                            "id": id
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                swal({
                                    title: "Data \""+nama+"\" berhasil dihapus.",
                                    icon: "success",
                                    button: "Tutup"
                                });

                                $("#"+id).closest("tr").remove();
                            } else {
                                swal({
                                    title: "Data \""+nama+"\" gagal dihapus.",
                                    text: response.keterangan,
                                    icon: "error",
                                    button: "Tutup"
                                });

                                $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                    <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="fa fa-info mx-2"></i>
                                    <strong>`+response.keterangan+`</strong>
                                </div>`);

                                $("#"+id).removeClass("focus");
                            }
                        },
                        error: function (jqXHR, exception) {
                            if (jqXHR.status === 0) {
                                keterangan = "Not connect (verify network).";
                            } else if (jqXHR.status == 404) {
                                keterangan = "Requested page not found.";
                            } else if (jqXHR.status == 500) {
                                keterangan = "Internal Server Error.";
                            } else if (exception === "parsererror") {
                                keterangan = "Requested JSON parse failed.";
                            } else if (exception === "timeout") {
                                keterangan = "Time out error.";
                            } else if (exception === "abort") {
                                keterangan = "Ajax request aborted.";
                            } else {
                                keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                            }
                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+keterangan+`</strong>
                            </div>`);

                            $("#"+id).removeClass("focus");
                        }
                    });
                }
                else {
                    $("#"+id).removeClass("focus");
                }
            });
        }

        function daftar_variabel() {
            $.ajax({
                url: `<?= base_url("api") ?>`+"/variabel",
                dataType: "json",
                type: "GET",
                success: function(response) {
                    if (response.status === 200) {
                        $("#dk_variabel").empty();
                        $("#dk_variabel").append(new Option("Pilih...", ""));
                        for (const index in response.keterangan) {
                            var option = new Option(response.keterangan[index].variabel_nama, response.keterangan[index].variabel_id);
                            $("#dk_variabel").append(option);
                        }
                    }
                }
            });
        }

        function daftar_kategori() {
            $.ajax({
                url: `<?= base_url("api") ?>`+"/variabel",
                dataType: "json",
                type: "GET",
                success: function(response) {
                    if (response.status === 200) {
                        var variabel = response.keterangan;
                        $("#daftar_variabel").empty();
                        for (const index in variabel) {
                            var string = `<div class="form-row">
                                                <div class="form-group col-md-4 d-flex align-items-center">
                                                    `+variabel[index].variabel_nama+`
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <select class="form-control" name="kategori[`+variabel[index].variabel_id+`]" id="select_`+variabel[index].variabel_id+`"></select>
                                                </div>
                                            </div>`;
                            $("#hasil_daftar_variabel").append(string);

                            $.ajax({
                                url: `<?= base_url("api") ?>`+"/kategori/lihat",
                                dataType: "json",
                                type: "POST",
                                data: {
                                    id: variabel[index].variabel_id
                                },
                                success: function(response) {
                                    if (response.status === 200) {
                                        let kategori = response.keterangan;
                                        $("#select_"+variabel[index].variabel_id).empty();
                                        $("#select_"+variabel[index].variabel_id).append(new Option("Pilih... (semua)", "semua"));
                                        for (const i in kategori) {
                                            var option = new Option(kategori[i].kategori_nama, kategori[i].kategori_id);
                                            $("#select_"+variabel[index].variabel_id).append(option);
                                        }
                                    }
                                }
                            });
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>