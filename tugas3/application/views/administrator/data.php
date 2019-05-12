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
                                        <div class="form-row">
                                            <div class="col-md-9 mt-2 mb-2">
                                                <h6 class="m-0">Daftar Data</h6>
                                            </div>
                                            <div class="col-md-3 pt-1 text-center">
                                                <div hidden="true">
                                                    <form id="form-tambah">
                                                        <div class="form-group">
                                                            <label for="nama">Nama Data</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama data" value="">
                                                        </div>
                                                        <div class="form-row">
                                                        </div>
                                                    </form>
                                                </div>
                                                <button type="button" class="btn btn-accent col-md-12" id="tambah">
                                                    <i class="fas fa-plus-square mr-1"></i>
                                                    Tambah Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 pb-3 text-center">          
                                        <table class="table mb-0" id="table" hidden="true">
                                            <thead class="bg-light">
                                                <tr>
                                                </tr>
                                            </thead>
                                            <tbody>
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

                $("#tambah").click(function() {
                    swal({
                        title: "Tambah Data",
                        content: $("#form-tambah")[0],
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
                                data : new FormData($("#form-tambah")[0]),
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
                            $("#table thead tr").html(``);
                            $("#table tbody").html(``);

                            let variabel = response.keterangan;

                            $("#table thead tr").append(`<th scope="col" class="border-0">#</th>`);
                            $("#table thead tr").append(`<th scope="col" class="border-0">Nama</th>`);
                            for (let i=0; i<variabel.length; i++) {
                                $("#table thead tr").append(`<th scope="col" class="border-0">`+variabel[i].variabel_nama+`</th>`);
                                $("#form-tambah .form-row").append(`<div class="form-group `+((i%2 === 0 && i === variabel.length-1) ? "col-md-12" : "col-md-6")+`">
                                                                <label for="nilai[`+variabel[i].variabel_id+`]">Nilai `+variabel[i].variabel_nama+`</label>
                                                                <input type="number" class="form-control text-center" id="nilai[`+variabel[i].variabel_id+`]" name="nilai[`+variabel[i].variabel_id+`]" placeholder="Nilai `+variabel[i].variabel_nama+`" value="">
                                                            </div>`);
                            }
                            $("#table thead tr").append(`<th scope="col" class="border-0">Pengaturan</th>`);

                            $.ajax({
                                url: `<?= base_url("api/") ?>`+"data",
                                dataType: "json",
                                type: "GET",
                                success: function(response) {
                                    $("#status").html(``);
                                    
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
                                        $("#table tbody").append(string);
                                    } else {
                                        $("#keterangan").removeAttr("hidden");
                                        $("#keterangan div label").html(`Daftar data tidak ditemukan.`);
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
                                    $("#keterangan div label").html(`<a href="<?= base_url("administrator")."/data" ?>">Muat ulang halaman ini!</a>`);
                                }
                            });
                        } else {
                            $("#table").attr("hidden", "true");
                            $("#keterangan").removeAttr("hidden");
                            $("#keterangan div label").html(`Daftar data tidak ditemukan.`);
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
                        $("#keterangan div label").html(`<a href="<?= base_url("administrator")."/data" ?>">aswMuat ulang halaman ini!</a>`);
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
        </script>
        <!-- //javascript -->
	</body>
</html>