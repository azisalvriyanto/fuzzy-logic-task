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
                                            <div class="col-md-3 mt-2 mb-2">
                                                <h6 class="m-0">Daftar Keanggotaan</h6>
                                            </div>
                                            <div class="col-md-4 pt-1 text-center">
                                                <select id="variabel" class="form-control">
                                                    <option>Pilih...</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 pt-1 text-center">
                                                <button type="button" class="btn btn-accent col-md-12" id="generate">
                                                    <i class="fas fa-sync-alt mr-1"></i>
                                                    Reka Ulang Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 pb-3 text-center">
                                        <div id="derajatkeanggotaan"></div>
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
                daftar_variabel();

                $("#generate").click(function() {
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

                $("#variabel").change(function() {
                    var variabel = $(this).find(":selected").attr("value");
                    $.ajax({
                        url: `<?= base_url("api") ?>`+"/kategori/lihat",
                        dataType: "json",
                        type: "POST",
                        data: {
                            id: variabel
                        },
                        success: function(response) {
                            $("#status").html(``);
                            $("#table").removeAttr("hidden");
                            $("#keterangan").attr("hidden", "true");
                            $("#table thead tr").html(``);
                            $("#table tbody").html(``);
                            $("#derajatkeanggotaan").html(``);

                            if (response.status === 200) {

                                let kategori = response.keterangan;

                                $("#table thead tr").append(`<th scope="col" class="border-0">#</th>`);
                                $("#table thead tr").append(`<th scope="col" class="border-0">Data</th>`);
                                for (let i=0; i<kategori.length; i++) {
                                    $("#table thead tr").append(`<th scope="col" class="border-0">`+kategori[i].kategori_nama+`</th>`);
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
                                            $("#table tbody").append(string);
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
            });

            function daftar_variabel() {
                $("#keterangan div label").html("Silahkan pilih variabel terlebih dahulu.");

                $.ajax({
                    url: `<?= base_url("api") ?>`+"/variabel",
                    dataType: "json",
                    type: "GET",
                    success: function(response) {
                        if (response.status === 200) {
                            $("#variabel").empty();
                            $("#variabel").append(new Option("Pilih...", ""));
                            for (const index in response.keterangan) {
                                var option = new Option(response.keterangan[index].variabel_nama, response.keterangan[index].variabel_id);
                                $("#variabel").append(option);
                            }
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
            }
        </script>
        <!-- //javascript -->
	</body>
</html>