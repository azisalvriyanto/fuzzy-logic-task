<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
					<div class="main-navbar">
						<nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
							<a class="navbar-brand w-100 mr-0" href="<?= base_url("administrator") ?>" style="line-height: 25px;">
								<div class="d-table m-auto d-flex align-items-center">
									<img id="main-logo" class="d-inline-block align-top mr-1" style="height: 25px;" src="data:image/ico;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAQAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALAAAAE4AAABNAAAATQAAAE0AAABNAAAATQAAAE0AAABNAAAATQAAAE0AAABNAAAATQAAAE0AAABPAAAAH/r/9On///////////////////////////////////////////////////////////////////////////n/8sv9//vn///////////////////////////////////////////////////////////////////////////8//jM/v/95v///////////////////////////////////////////////////////////////////////////f/6yv///+X//////////////////////////////////////////////////////////////////////////////cj//v7l///////////////////////////////////////////////////////////////////////////////I/v/45P/////////+/////v////7////+/////v////7////+/////v////7////+/////v////7//////v/4xwAA1eUTAND/GADP/xQAzv8NAMz/CwDM/wwAzP8MAMz/DADM/wwAzP8MAMz/DADM/woAzP8GAMz/AADP/wAA68g1HdvlOyXW/z0o1f8+KtX/PyvV/zwo1P84JNL/NCHR/zMg0f8zINH/MyDR/zMg0f8yH9H/MB3R/y8b1P81GvHINh7b5T4n1/9AKtb/QSzW/0Et1v9CLtb/Qi7W/0Iu1v9BLdb/PyvV/z4q1f8+KtX/PynV/z8p1f8/J9n/Oh/zyDce3OVBKdn/QizX/0Mt1/9ELtf/RC7X/0Qv1/9EL9f/RS/X/0Uv1/9FL9f/RC7X/0Mu1/9CK9b/QSja/zgf88g3HtzmQCXa/0Eo2P9CKtj/QirY/0Mr2P9DK9j/QyvY/0Mr2P9DK9j/QivY/0Iq2P9CKdj/QSfY/0El3P84H/PJNiTX4mJS3/9gUN3/YVHd/2FR3f9hUd3/YVHd/2FR3f9hUd3/YVHd/2FR3f9hUd3/YVHd/2BQ3f9gT+D/LxnywgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAA//8AAA==">
									<span class="d-none d-md-inline ml-1">Logika Fuzzy</span>
								</div>
							</a>
							<a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
								<i class="material-icons">&#xE5C4;</i>
							</a>
						</nav>
					</div>
					<div class="nav-wrapper">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link<?= (@strtolower($menu["judul"]) == "beranda") ? " active" : ""; ?>" href="<?= base_url("administrator/") ?>beranda">
									<i class="material-icons">dashboard</i>
									<span>Beranda</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link<?= (@strtolower($menu["judul"]) == "variabel") ? " active" : ""; ?>" href="<?= base_url("administrator/") ?>variabel">
									<i class="material-icons">bookmarks</i>
									<span>Variabel</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link<?= (@strtolower($menu["judul"]) == "data") ? " active" : ""; ?>" href="<?= base_url("administrator/") ?>data">
									<i class="material-icons">assignment</i>
									<span>Data</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link<?= (@strtolower($menu["judul"]) == "keanggotaan") ? " active" : ""; ?>" href="<?= base_url("administrator/") ?>keanggotaan">
									<i class="material-icons">group</i>
									<span>Keanggotaan</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link<?= (@strtolower($menu["judul"]) == "hitung") ? " active" : ""; ?>" href="<?= base_url("administrator/") ?>hitung">
									<i class="material-icons">compare_arrows</i>
									<span>Hitung</span>
								</a>
							</li>
						</ul>
					</div>
				</aside>