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
										<form id="form">
											<div class="form-row">
												<div class="col-md-4 pt-1 text-center" id="daftar_variabel">Tidak ada koneksi.</div>
												<div class="form-row col-md-8 pt-1 text-center d-flex align-items-center">
													<div class="form-group col-md-12">
														<select class="form-control" id="operasi" name="operasi">
															<option value="">Pilih... (operasi)</option>
															<option value="1">OR</option>
															<option value="2">AND</option>
														</select>
													</div>
													<div class="form-group col-md-12">
														<button type="button" class="btn btn-accent col-md-12" id="cari">
															<i class="fas fa-search mr-1"></i>
															Cari
														</button>
													</div>
												</div>
											</form>
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
                daftar_kategori();

                $("#cari").click(function() {
                    $.ajax({
						url: `<?= base_url("api") ?>`+"/cari",
						dataType: "json",
						type: "POST",
						data : new FormData($("#form")[0]),
						contentType: false,
						processData: false,
						success: function(response) {
							if (response.status === 200) {
								let keanggotaan = response.keterangan;

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
												if ($("#select_"+variabel[i].variabel_id).find(":selected").attr("value") !== "semua") {
													$("#table thead tr").append(`<th scope="col" class="border-0">`+variabel[i].variabel_nama+` (`+$("#select_"+variabel[i].variabel_id+" option:selected").text()+`)</th>`);
												}
											}
											$("#table thead tr").append(`<th scope="col" class="border-0">Rekomendasi (`+$("#operasi option:selected").text()+`)</th>`);

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
                                            $("#table tbody").append(string);
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
							} else {
								swal({
									title: "Terdapat inputan yang kosong.",
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
                });
            });

            function daftar_kategori() {
                $("#keterangan div label").html("Silahkan pilih pengaturan pencarian terlebih dahulu.");

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
								$("#daftar_variabel").append(string);

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
											$("#select_"+variabel[index].variabel_id).append(new Option("Pilih...", "semua"));
											for (const i in kategori) {
												var option = new Option(kategori[i].kategori_nama, kategori[i].kategori_id);
												$("#select_"+variabel[index].variabel_id).append(option);
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