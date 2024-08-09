<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Perpustakaan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light">
    <!-- Containter Start -->
    <main class="row d-flex">
        <!-- Sidebar Start -->
        <div class="col-sm-12 col-md-12 col-lg-3">
            <ul class="nav flex-column p-4 sidebar">
                <!-- Profil -->
                <div class="d-flex flex-column align-items-center profil">
                    <img src="assets/img/man.png" alt="foto-profil" style="width: 75px; height: 75px;">
                    <h4 class="mt-2">Admin</h4>
                    <p>ID Karyawan : 2323112</p>
                </div>
                <!-- Menu -->
                <div class="d-flex flex-column gap-2 align-items-start menu">
                    <h5 class="mt-3">Menu</h5>
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" aria-current="page" href="index.php"><img src="assets/img/dashboard.png" alt="icon-dashboard" style="width: 25px; height: 25px;">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" aria-current="page" href="?page=member"><img src="assets/img/member.png" alt="icon-member" style="width: 25px; height: 25px;">Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" aria-current="page" href="?page=book"><img src="assets/img/book.png" alt="icon-book" style="width: 25px; height: 25px;">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" aria-current="page" href="?page=transaction"><img src="assets/img/transaction.png" alt="icon-transaction" style="width: 25px; height: 25px;">Transaction</a>
                    </li>
                </div>
            </ul>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="container-fluid col-sm-12 col-md-12 col-lg-9 p-4">
            <!-- Main Content -->
            <?php
            $page = $_GET['page'];
            $aksi = $_GET['aksi'];

            if ($page == "member") {
                if ($aksi == "") {
                    include "page/member/member.php";
                }
            } elseif ($page == "book") {
                if ($aksi == "") {
                    include "page/book/book.php";
                } elseif ($aksi == "tambah") {
                    include "page/book/tambah.php";
                }
            } elseif ($page == "transaction") {
                if ($aksi == "") {
                    include "page/transaction/transaction.php";
                }
            }
            ?>
        </div>
        <!-- Content End -->
    </main>
    <!-- Containter End -->

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>