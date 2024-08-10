<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <!-- Form Login Start -->
    <section style="background-color: #508bfc; min-height: 100vh;" class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <!-- Header -->
                            <div class="d-flex flex-column align-items-center">
                                <img src="assets/img/logo-perpus.png" alt="logo-perpus" class="mb-4" style="width: 130px; height: 130px;">
                                <h3 class="mb-5">Silahkan Login</h3>
                            </div>
                            <form method="post">
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label">Username<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Masukkan Username" required />
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label">Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Masukkan Password" required />
                                </div>
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit" name="kirim" style="width: 100%;">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form Login End -->
</body>

</html>

<!-- Koneksi Database -->
<?php

$koneksi = new mysqli("localhost", "root", "", "db_perpus");

if (isset($_POST['kirim'])) {
    $username = $_POST['username'] ?? ''; 
    $password = $_POST['password'] ?? ''; 

    // Lakukan query ke database
    $sql = $koneksi->query("SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");

    $data = $sql->fetch_assoc();
    $cek = $sql->num_rows;

    if ($cek >= 1) {
        session_start();

        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];

        header("location: index.php");
    } else {
        echo "<script>alert('Username / Password Salah')</script>";
    }
}

?>

