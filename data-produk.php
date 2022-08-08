<?php 
	session_start();
    include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data App | Dashboard</title>
    <!-- Favicon -->

    <!-- Custom styles -->
    <link rel="stylesheet" href="./css/style.min.css" />
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
                            <a class="active" href="dashboard.php"><span class="icon home"
                                    aria-hidden="true"></span>Dashboard</a>
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
                                <span class="icon paper" aria-hidden="true"></span>Data Produk
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="data-produk.php">Semua Produk</a>
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
                <div class="section">
                    <div class="container">
                        <h2 class="main-title">Data Produk</h2>
                        <div class="box">
                            <button
                                style="background-color: #0061f7; color: #fff; padding: 5px;  border-radius: 10px; margin-bottom: 10px;"><a
                                    href="tambah-produk.php">Tambah Data</a></button>
                            <table border="1" cellspacing="0" class="table">
                                <thead>
                                    <tr>
                                        <th width="60px">No</th>
                                        <th>Kategori</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th width="150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
							$no = 1;
							$produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
							if(mysqli_num_rows($produk) > 0){
							while($row = mysqli_fetch_array($produk)){
						?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['category_name'] ?></td>
                                        <td><?php echo $row['product_name'] ?></td>
                                        <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                                        <td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"> <img
                                                    src="produk/<?php echo $row['product_image'] ?>" width="50px"> </a>
                                        </td>
                                        <td><?php echo ($row['product_status'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
                                        <td>
                                            <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> || <a
                                                href="proses-hapus.php?idp=<?php echo $row['product_id'] ?>"
                                                onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php }}else{ ?>
                                    <tr>
                                        <td colspan="7">Tidak ada data</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2022 © App Toko - <a href="index.php" target="_blank" rel="noopener noreferrer">App Toko</a>
                        </p>
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