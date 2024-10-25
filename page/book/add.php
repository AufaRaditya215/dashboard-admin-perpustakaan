<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>
    <!-- Tambah Buku Form Start -->
    <main class="container-fluid">
        <h3 class="fw-bold">Form Tambah Buku</h3>
        <hr>
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Judul<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Buku" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Pengarang<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="pengarang" placeholder="Masukkan Nama Pengarang" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Penerbit<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Nama Penerbit" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Tahun Terbit<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="tahun" inputmode="numeric" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Masukkan Angka" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Jumlah Buku<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="jumlah" inputmode="numeric" maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Masukkan Angka" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Tanggal Input<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                </div>
                <button class="btn btn-primary mt-2 me-2" type="submit" name="simpan" value="Simpan" style="width: 100px;">Submit</button>
                <button class="btn btn-danger mt-2" type="button" name="batal" value="Batal" onclick="window.location.href='?page=book'" style="width: 100px;">Cancel</button>
        </form>
        </div>
    </main>
</body>

</html>
<!-- Tambah Buku Form End -->

<!-- Koneksi untuk post form -->
<?php
$koneksi = new mysqli("localhost", "root", "", "db_perpus");
?>

<?php
$judul = isset($_POST['judul']) ? $_POST['judul'] : '';
$pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
$penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
$jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';
$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
$simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';

if ($simpan) {
    $sql = $koneksi->query("INSERT INTO tb_buku (judul, pengarang, penerbit, tahun_terbit, jumlah_buku, tgl_input) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', '$jumlah', '$tanggal')");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Tersimpan");
            window.location.href = "?page=book";
        </script>
<?php
    }
}

?>