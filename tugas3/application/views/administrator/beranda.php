<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
		<?php $this->load->view("administrator/_partials/head.php") ?>
    
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

					<!-- field -->
                    <div class="error">
                        <div class="error__content">
                            <h2>Selamat datang</h2>
                            <h3><?= $pengguna["nama"] ?>!</h3>
                            <p>Aplikasi Rekomendasi Pemilihan Menu Makanan Sehat Untuk Anak Penderita Obesitas Menggunakan Metode Fuzzy Tahani</p>
                        </div>
                    </div>
                    <!-- //field -->

					<!-- footer -->
                    <?php $this->load->view("administrator/_partials/footer.php") ?>
					
                    <!-- //footer -->
				</main>
			</div>
		</div>

        <!-- javascript -->
        <?php $this->load->view("administrator/_partials/javascript.php") ?>

		<script src="<?= base_url("assets/administrator/") ?>scripts/app/app-blog-overview.1.1.0.js"></script>
        <!-- //javascript -->
	</body>
</html>