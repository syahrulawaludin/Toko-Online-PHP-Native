<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>App Toko | Dashboard</title>
  <!-- Favicon -->

  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css" />
  <link rel="stylesheet" href="css/style3.css">
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
              <a class="show-cat-btn" href="##">
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
      <!-- ! Main -->
      <!-- content -->
      <main class="main users chart-page" id="skip-target">
        <div class="section" style="padding-bottom: 100px;">
          <div class="container">
            <h2 class="main-title">Profil</h2>
            <div class="box">
              <form action="" method="POST">
                <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control"
                  value="<?php echo $d->admin_name ?>" required>
                <input type="text" name="user" placeholder="Username" class="input-control"
                  value="<?php echo $d->username ?>" required>
                <input type="text" name="hp" placeholder="No Hp" class="input-control"
                  value="<?php echo $d->admin_telp ?>" required>
                <input type="email" name="email" placeholder="Email" class="input-control"
                  value="<?php echo $d->admin_email ?>" required>
                <input type="text" name="alamat" placeholder="Alamat" class="input-control"
                  value="<?php echo $d->admin_address ?>" required>
                <input type="submit" name="submit" value="Ubah Profil" class="btn" style=" background-color: #0061f7;
  color: #fff;
  padding: 10px;
  border-radius: 10px;">
              </form>
              <?php  
					if(isset($_POST['submit'])){

						$nama 	= ucwords($_POST['nama']);
						$user 	= $_POST['user'];
						$hp 	= $_POST['hp'];
						$email 	= $_POST['email'];
						$alamat = ucwords($_POST['alamat']);

						$update = mysqli_query($conn, "UPDATE tb_admin SET 
										admin_name = '".$nama."',
										username = '".$user."',
										admin_telp = '".$hp."',
										admin_email = '".$email."',
										admin_address = '".$alamat."'
										WHERE admin_id = '".$d->admin_id."' ");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="profil.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}

					}
				?>
            </div>

            <h2 class="main-title">Ubah Password</h2>
            <div class="box">
              <form action="" method="POST">
                <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control"
                  required>
                <input type="submit" name="ubah_password" value="Ubah Password" style="background-color: #0061f7;
  color: #fff;
  padding: 10px;
  border-radius: 10px;">
              </form>
              <?php 
					if(isset($_POST['ubah_password'])){

						$pass1 	= $_POST['pass1'];
						$pass2 	= $_POST['pass2'];

						if($pass2 != $pass1){
							echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
						}else{

							$u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
										password = '".MD5($pass1)."'
										WHERE admin_id = '".$d->admin_id."' ");
							if($u_pass){
								echo '<script>alert("Ubah data berhasil")</script>';
								echo '<script>window.location="profil.php"</script>';
							}else{
								echo 'gagal '.mysqli_error($conn);
							}
						}

					}
				?>
            </div>
          </div>
        </div>
      </main>

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
  <!-- Icons library -->
  <script src="plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="js/script.js"></script>
</body>

</html>