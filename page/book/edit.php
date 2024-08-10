<?php
// Koneksi Database untuk edit data buku
$koneksi = new mysqli("localhost", "root", "", "db_perpus");

// Ambil ID dari query
$id = isset($_GET['id_buku']) ? $_GET['id_buku'] : '';

// Ambil data buku berdasarkan ID
$sql = $koneksi->query("SELECT * FROM tb_buku WHERE id_buku = '$id'");
$data = $sql->fetch_assoc();
?>

<!-- HTML Edit Buku -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>
    <main class="container-fluid">
        <h3 class="fw-bold">Edit Data Buku</h3>
        <hr>
        <!-- Form Edit Buku Start -->
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Judul</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo htmlspecialchars($data['judul'] ?? ''); ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" value="<?php echo htmlspecialchars($data['pengarang'] ?? ''); ?>" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" value="<?php echo htmlspecialchars($data['penerbit'] ?? ''); ?>" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Tahun Terbit</label>
                        <input type="text" class="form-control" name="tahun" value="<?php echo htmlspecialchars($data['tahun_terbit'] ?? ''); ?>" inputmode="numeric" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Masukkan Angka" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Jumlah Buku</label>
                        <input type="text" class="form-control" name="jumlah" value="<?php echo htmlspecialchars($data['jumlah_buku'] ?? ''); ?>" inputmode="numeric" maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Masukkan Angka" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Tanggal Input</label>
                        <input type="date" class="form-control" name="tanggal" value="<?php echo htmlspecialchars($data['tgl_input'] ?? ''); ?>" required>
                    </div>
                </div>
                <button class="btn btn-primary mt-2 me-3" type="submit" name="simpan" value="Simpan" style="width: 100px;">Submit</button>
                <button class="btn btn-danger mt-2" type="button" name="batal" value="Batal" onclick="window.location.href='?page=book'" style="width: 100px;">Cancel</button>
            </div>
        </form>
        <!-- Form Edit Buku End -->
    </main>
</body>
</html>


<!-- Koneksi untuk edit form -->
<?php
if (isset($_POST['simpan'])) {
    $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
    $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
    $penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
    $tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';

    $sql = $koneksi->query("UPDATE tb_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun', jumlah_buku='$jumlah', tgl_input='$tanggal' WHERE id_buku='$id'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Tersimpan");
            window.location.href = "?page=book";
        </script>
<?php
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>