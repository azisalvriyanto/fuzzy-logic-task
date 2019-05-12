<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("administrator/_partials/head.php") ?>

        <style type="text/css">
            .table td {
                vertical-align : middle;
            }

            tbody tr:hover {
                background-color: #fbfbfb;
                color: #007bff;
                box-shadow: inset .1875rem 0 0 #007bff;
                will-change: background-color,box-shadow,color;
                transition: box-shadow .2s ease,color .2s ease,background-color .2s ease;
            }

            .focus {
                background-color: #fbfbfb;
                color: #007bff;
                box-shadow: inset .1875rem 0 0 #007bff;
                will-change: background-color,box-shadow,color;
                transition: box-shadow .2s ease,color .2s ease,background-color .2s ease;
            }
        </style>
    </head>
	<body class="h-100">
		<div class="container-fluid">
			<div class="row">
				<!-- sidebar -->
                <?php $this->load->view("administrator/_partials/sidebar.php") ?>
				
                <!-- //sidebar -->

				<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
					<!-- navbar -->
                    <?php $this->load->view("administrator/_partials/navbar.php") ?>

                    <!-- /navbar -->

					<div class="main-content-container container-fluid px-4">
						<!-- header -->
                        <?php $this->load->view("administrator/_partials/header.php") ?>

                        <!-- //header -->

						<!-- field -->
						<div class="row">
                            <div class="col">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <div class="form-row d-flex align-items-center">
                                            <div class="col-md-9 mt-2 mb-2">
                                                <h6 class="m-0">Daftar Variabel</h6>
                                            </div>
                                            <div class="col-md-3 pt-1 text-center">
                                                <div hidden="true">
                                                    <form id="form-pengaturan"></form>
                                                    <div class="form-group salin">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label>Pengaturan</label>
                                                                <button type="button" class="form-control btn btn-sm btn-outline-danger hapus"><i class="fas fa-trash-alt"></i></button>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label>Kategori</label>
                                                                <input type="text" class="form-control" name="kategori[]" placeholder="Nama Kategori" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-3">
                                                                    <label>Awal</label>
                                                                    <input type="number" class="form-control text-center" name="awal[]" placeholder="Awal" value="">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>TengahW</label>
                                                                    <input type="number" class="form-control text-center" name="tengahw[]" placeholder="Tengah Awal" value="">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>TengahK</label>
                                                                    <input type="number" class="form-control text-center" name="tengahk[]" placeholder="Tengah Akhir" value="">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Akhir</label>
                                                                    <input type="number" class="form-control text-center" name="akhir[]" placeholder="Akhir" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-accent col-md-12" id="tambah">
                                                    <i class="fas fa-plus-square mr-1"></i>
                                                    Tambah Variabel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 pb-3 text-center">
                                        <table class="table mb-0" id="table" hidden="true">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col" class="border-0">#</th>
                                                    <th scope="col" class="border-0">Nama</th>
                                                    <th scope="col" class="border-0">Pengaturan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">
                                            </tbody>
                                        </table>

                                        <div id="keterangan" class="row">
                                            <div class="col-md-12 text-center pt-3">
                                                <label>Tidak ada koneksi.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
						<!-- //field -->
						
                    </div>
                    
                    <!-- footer -->
                    <?php $this->load->view("administrator/_partials/footer.php") ?>
					
                    <!-- //footer -->
				</main>
			</div>
        </div>

        <!-- javascript -->
        <?php $this->load->view("administrator/_partials/javascript.php") ?>

        <script>
			$(document).ready(function() {
                daftar();

                $("#form-pengaturan").on('click', "#kategori_tambah", function() {
                    $("#form-pengaturan").append(`<div class="form-group pervaribel">`+$(".salin").html()+`</div>`);
                    $("#kategori_keterangan").remove();
                    $("#form-pengaturan").append(`<div class="form-group" id="kategori_keterangan">
                        <small>*Kosongkan inputan jika nilai min atau max;</small>
                        <button type="button" class="btn btn-accent col-md-12" id="kategori_tambah">
                            <i class="fas fa-user-plus mr-1"></i>
                            Tambah Kategori
                        </button>
                    </div>`);
                });

                $("#form-pengaturan").on("click", ".hapus", function() {
                    $(this).parents(".pervaribel").remove();
                });

                $("#tambah").click(function() {
                    $("#form-pengaturan").html(`<div class="form-group">
                        <label for="nama">Nama Variabel</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Variabel" value="">
                    </div>`);
                    $("#form-pengaturan").append(`<div class="form-group pervaribel">`+$(".salin").html()+`</div>`);
                    $("#form-pengaturan").append(`<div class="form-group" id="kategori_keterangan">
                        <small>*Kosongkan inputan jika nilai min atau max;</small>
                        <button type="button" class="btn btn-accent col-md-12" id="kategori_tambah">
                            <i class="fas fa-user-plus mr-1"></i>
                            Tambah Kategori
                        </button>
                    </div>`);

                    swal({
                        icon: "warning",
                        title: "Tambah Variabel",
                        content: $("#form-pengaturan")[0],
                        buttons: [
                            true,
                            {
                                text: "Tambah!",
                                closeModal: false,
                            }
                        ],
                    })
                    .then((yes) => {
                        if (yes) {
                            $.ajax({
                                url: `<?= base_url("api/") ?>`+"variabel/tambah",
                                dataType: "json",
                                type: "POST",
                                data : new FormData($("#form-pengaturan")[0]),
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
            });

            function daftar() {
                $("#keterangan div label").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang memuat...");

                $.ajax({
                    url: `<?= base_url("api/") ?>`+"variabel",
                    dataType: "json",
                    type: "GET",
                    success: function(response) {
                        $("#status").html(``);
                        
                        if (response.status === 200) {
                            $("#status").html(``);
                            $("#table").removeAttr("hidden");
                            $("#keterangan").attr("hidden", "true");
                            $("#tbody").html(``);

                            let data = response.keterangan;
                            
                            for (let i=0; i<data.length; i++) {
                                $("#tbody").append(`<tr id="`+data[i].variabel_id+`">
                                                <td>`+(nomor = i+1)+`</td>
                                                <td class="text-left">`+data[i].variabel_nama+`</td>
                                                <td class="text-nowrap">
                                                    <button type="button" onclick="sunting(\``+data[i].variabel_id+`\`, \``+data[i].variabel_nama+`\`);" class="btn btn-sm btn-outline-info mr-1"><i class="fas fa-pencil-alt mr-1"></i> Sunting</button>
                                                    <button type="button" onclick="hapus(\``+data[i].variabel_id+`\`, \``+data[i].variabel_nama+`\`);" class="btn btn-sm btn-outline-danger mr-1"><i class="fas fa-trash-alt mr-1"></i> Hapus</button>
                                                </td>
                                            <tr>`);
                            }
                        } else {
                            $("#keterangan").removeAttr("hidden");
                            $("#keterangan div label").html(`Daftar variabel tidak ditemukan.`);
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

                        $("#table").attr("hidden", "true");
                        $("#keterangan").removeAttr("hidden");
                        $("#keterangan div label").html(`<a href="<?= base_url("administrator")."/variabel" ?>">Muat ulang halaman ini!</a>`);
                    }
                });
            }

            function sunting(id) {
                $("#status").html(``);
                
                $.ajax({
                    url: `<?= base_url("api/") ?>`+"variabel/lihat",
                    dataType: "json",
                    type: "POST",
                    data : {
                        "id": id
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            let data = response.keterangan;
                            $("#form-pengaturan").html(`<div class="form-group">
                                <label for="nama">Nama Variabel</label>
                                <input type="text" class="form-control" id="id" name="id" placeholder="ID Variabel" value="`+data.variabel.id+`" hidden>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Variabel" value="`+data.variabel.nama+`">
                            </div>`);
                            for (const key in data.kategori) {
                                $("#form-pengaturan").append(`<div class="form-group pervaribel">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Pengaturan</label>
                                            <button type="button" class="form-control btn btn-sm btn-outline-danger hapus"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label>Kategori</label>
                                            <input type="text" class="form-control" name="kategori[`+data.kategori[key].id+`]" placeholder="Nama Kategori" value="`+data.kategori[key].nama+`">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>Awal</label>
                                                <input type="number" class="form-control text-center" name="awal[`+data.kategori[key].id+`]" placeholder="Awal" value="`+data.kategori[key].nilai[0]+`">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>TengahW</label>
                                                <input type="number" class="form-control text-center" name="tengahw[`+data.kategori[key].id+`]" placeholder="Tengah Awal" value="`+data.kategori[key].nilai[1]+`">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>TengahK</label>
                                                <input type="number" class="form-control text-center" name="tengahk[`+data.kategori[key].id+`]" placeholder="Tengah Akhir" value="`+data.kategori[key].nilai[2]+`">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Akhir</label>
                                                <input type="number" class="form-control text-center" name="akhir[`+data.kategori[key].id+`]" placeholder="Akhir" value="`+data.kategori[key].nilai[3]+`">
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
                            }
                            $("#form-pengaturan").append(`<div class="form-group" id="kategori_keterangan">
                                <small>*Kosongkan inputan jika nilai min atau max;</small>
                                <button type="button" class="btn btn-accent col-md-12" id="kategori_tambah">
                                    <i class="fas fa-user-plus mr-1"></i>
                                    Tambah Kategori
                                </button>
                            </div>`);

                            swal({
                                icon: "warning",
                                title: "Sunting Variabel",
                                content: $("#form-pengaturan")[0],
                                buttons: [
                                    true,
                                    {
                                        text: "Simpan!",
                                        closeModal: false,
                                    }
                                ],
                            })
                            .then((yes) => {
                                if (yes) {
                                    $.ajax({
                                        url: `<?= base_url("api/") ?>`+"variabel/perbarui",
                                        dataType: "json",
                                        type: "POST",
                                        data : new FormData($("#form-pengaturan")[0]),
                                        contentType: false,
                                        processData: false,
                                        success: function(response) {
                                            if (response.status === 200) {
                                                swal({
                                                    title: "Data berhasil diperbarui.",
                                                    icon: "success",
                                                    button: "Tutup"
                                                })
                                                .then((yes) => {
                                                    location.reload();
                                                });
                                            } else {
                                                swal({
                                                    title: "Data gagal diperbarui.",
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
                        } else {
                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+response.keterangan+`</strong>
                            </div>`);

                            $("#keterangan div label").html(`<a href="<?= base_url("administrator")."/variabel" ?>">Muat ulang halaman ini!</a>`);
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

            function hapus(id, nama) {
                $("#"+id).addClass("focus");

                swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, anda tidak dapat memulihkan variabel \""+nama+"\".",
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
					        url: `<?= base_url("api/") ?>`+"variabel/hapus",
                            dataType: "json",
                            type: "POST",
                            data : {
                                "id": id
                            },
                            success: function(response) {
                                if (response.status === 200) {
                                    swal({
                                        title: "Tautan \""+nama+"\" berhasil dihapus.",
                                        icon: "success",
                                        button: "Tutup"
                                    });

                                    $("#"+id).closest("tr").remove();
                                } else {
                                    swal({
                                        title: "Tautan \""+nama+"\" gagal dihapus.",
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
        </script>
        <!-- //javascript -->
	</body>
</html>