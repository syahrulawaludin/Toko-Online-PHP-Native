<?php 
	session_start();
    include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
  $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($produk) == 0){
		echo '<script>window.location="data-produk.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Aplikasi| Dashboard</title>
  <!-- Favicon -->

  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css" />
  <link rel="stylesheet" href="./css/style3.css" <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js">
  </script>
</head>

<body>
  <div class="layer"></div>
  <!-- ! Body -->
  <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
  <div class="page-flex">
    <!-- ! Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-start">
        <div class="sidebar-head">
          <a href="dashboard.php" class="logo-wrapper" title="Home">
            <span class="sr-only">Home</span>
            <span class="icon logo" aria-hidden="true"></span>
            <div class="logo-text">
              <span class="logo-title">App Toko</span>
              <span class="logo-subtitle">Dashboard</span>
            </div>
          </a>
          <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
            <span class="sr-only">Toggle menu</span>
            <span class="icon menu-toggle" aria-hidden="true"></span>
          </button>
        </div>
        <div class="sidebar-body">
          <ul class="sidebar-body-menu">
            <li>
              <a class="active" href="dashboard.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
            </li>

            <li>
              <a class="show-cat-btn" href="##">
                <span class="icon folder" aria-hidden="true"></span>Data Kategori
                <span class="category__btn transparent-btn" title="Open list">
                  <span class="sr-only">Open list</span>
                  <span class="icon arrow-down" aria-hidden="true"></span>
                </span>
              </a>
              <ul class="cat-sub-menu">
                <li>
                  <a href="data-kategori.php">Semua Kategori</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="show-cat-btn" href="data-produk.php">
                <span class="icon paper" aria-hidden="true"></span>Data Aplikasi
                <span class="category__btn transparent-btn" title="Open list">
                  <span class="sr-only">Open list</span>
                  <span class="icon arrow-down" aria-hidden="true"></span>
                </span>
              </a>
              <ul class="cat-sub-menu">
                <li>
                  <a href="data-produk.php">Semua Aplikasi</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </aside>
    <div class="main-wrapper">
      <!-- ! Main nav -->
      <nav class="main-nav--bg">
        <div class="container main-nav">
          <div class="main-nav-start">
            <div class="search-wrapper">
              <i data-feather="search" aria-hidden="true"></i>
              <input type="text" placeholder="Enter keywords ..." required />
            </div>
          </div>
          <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
              <span class="sr-only">Toggle menu</span>
              <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>

            <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
              <span class="sr-only">Switch theme</span>
              <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
              <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
            </button>

            <div class="nav-user-wrapper">
              <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                <span class="sr-only">My profile</span>
                <span class="nav-user-img">
                  <picture>
                    <source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp" />
                    <img src="./img/avatar/avatar-illustrated-02.png" alt="User name" /></picture>
                </span>
              </button>
              <ul class="users-item-dropdown nav-user-dropdown dropdown">
                <li>
                  <a href="profil.php">
                    <i data-feather="user" aria-hidden="true"></i>
                    <span>Profile</span>
                  </a>
                </li>
                <li>
                  <a class="danger" href="keluar.php">
                    <i data-feather="log-out" aria-hidden="true"></i>
                    <span>Log out</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- content -->
      <div class="section">
        <div class="container">
          <h3>Edit Data Produk</h3>
          <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
              <select class="input-control" name="kategori" required>
                <option value="">--Pilih--</option>
                <?php 
							$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
                <option value="<?php echo $r['category_id'] ?>"
                  <?php echo ($r['category_id'] == $p->category_id)? 'selected':''; ?>><?php echo $r['category_name'] ?>
                </option>
                <?php } ?>
              </select>

              <input type="text" name="nama" class="input-control" placeholder="Nama Aplikasi"
                value="<?php echo $p->product_name ?>" required>

              <img src="produk/<?php echo $p->product_image ?>" width="100px">
              <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
              <input type="file" name="gambar" class="input-control">
              <textarea class="input-control" name="deskripsi"
                placeholder="Deskripsi"><?php echo $p->product_description ?></textarea><br>
              <select class="input-control" name="status">
                <option value="">--Pilih--</option>
                <option value="1" <?php echo ($p->product_status == 1)? 'selected':''; ?>>Aktif</option>
                <option value="0" <?php echo ($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
              </select>
              <input type="submit" name="submit" value="Submit" class="btn"
                style="background-color: #0061f7; color: #fff;padding: 10px; border-radius: 10px;">
            </form>
            <?php 
					if(isset($_POST['submit'])){

						// data inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$deskripsi 	= $_POST['deskripsi'];
						$status 	= $_POST['status'];
						$foto 	 	= $_POST['foto'];

						// data gambar yang baru
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						

						// jika admin ganti gambar
						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'produk'.time().'.'.$type2;

							// menampung data format file yang diizinkan
							$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							// validasi format file
							if(!in_array($type2, $tipe_diizinkan)){
								// jika format file tidak ada di dalam tipe diizinkan
								echo '<script>alert("Format file tidak diizinkan")</scrtip>';

							}else{
								unlink('./produk/'.$foto);
								move_uploaded_file($tmp_name, './produk/'.$newname);
								$namagambar = $newname;
							}

						}else{
							// jika admin tidak ganti gambar
							$namagambar = $foto;
							
						}

						// query update data produk
						$update = mysqli_query($conn, "UPDATE tb_product SET 
												category_id = '".$kategori."',
												product_name = '".$nama."',
												product_description = '".$deskripsi."',
												product_image = '".$namagambar."',
												product_status = '".$status."'
												WHERE product_id = '".$p->product_id."'	");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="data-produk.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}
						
					}
				?>
          </div>
        </div>
      </div>
      <script>
        CKEDITOR.replace('deskripsi');
      </script>
      <!-- ! Footer -->
      <footer class="footer">
        <div class="container footer--flex">
          <div class="footer-start">
            <p>2022 © App Toko - <a href="index.php" target="_blank" rel="noopener noreferrer">App Toko</a></p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Chart library -->
  <script src="./plugins/chart.min.js"></script>
  <script>
    CKEDITOR.replace('deskripsi');
  </script>

  <!-- Icons library -->
  <script src="plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="js/script.js"></script>
</body>

</html>