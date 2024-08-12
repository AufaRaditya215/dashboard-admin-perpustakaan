<?php
// Koneksi Database untuk edit data member
$koneksi = new mysqli("localhost", "root", "", "db_perpus");

// Ambil ID dari query
$id = isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : '';

// Ambil data anggota berdasarkan ID
$sql = $koneksi->query("SELECT * FROM tb_transaksi WHERE id_transaksi = '$id'");
$data = $sql->fetch_assoc();
?>

<!-- HTML Edit Buku -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi Peminjaman</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>
    <main class="container-fluid">
        <h3 class="fw-bold">Edit Data Transaksi</h3>
        <hr>
        <!-- Form Edit Transaksi Start -->
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">ID Anggota<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="id_anggota" inputmode="numeric" maxlength="18" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?php echo htmlspecialchars($data['id_anggota'] ?? ''); ?>" placeholder="Masukkan ID Anggota" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Nama<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($data['nama'] ?? ''); ?>" placeholder="Masukkan Nama Peminjam" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Judul Buku<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" value="<?php echo htmlspecialchars($data['judul'] ?? ''); ?>" placeholder="Masukkan Judul Buku" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Tanggal Peminjaman<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="tgl_pinjam" value="<?php echo htmlspecialchars($data['tgl_pinjam'] ?? ''); ?>" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Tanggal Pengembalian<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="tgl_kembali" value="<?php echo htmlspecialchars($data['tgl_kembali'] ?? ''); ?>" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Status<span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="Dipinjam" <?php echo ($data['status'] == 'Dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
                                <option value="Dikembalikan" <?php echo ($data['status'] == 'Dikembalikan') ? 'selected' : ''; ?>>Dikembalikan</option>
                            </select>
                    </div>
                </div>
                </div>
                <button class="btn btn-primary mt-2 me-3" type="submit" name="simpan" value="Simpan" style="width: 100px;">Submit</button>
                <button class="btn btn-danger mt-2" type="button" name="batal" value="Batal" onclick="window.location.href='?page=transaction'" style="width: 100px;">Cancel</button>
            </div>
        </form>
        <!-- Form Edit Transaksi End -->
    </main>
</body>

</html>


<!-- Koneksi untuk edit form -->
<?php
if (isset($_POST['simpan'])) {

    $idAnggota = isset($_POST['id_transaksi']) ? $_POST['id_transaksi'] :'';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
    $tgl_pinjam = isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : '';
    $tgl_kembali = isset($_POST['tgl_kembali']) ? $_POST['tgl_kembali'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';

    $sql = $koneksi->query("UPDATE tb_transaksi SET nama='$nama', judul='$judul', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', status='$status' WHERE id_transaksi='$id'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Tersimpan");
            window.location.href = "?page=transaction";
        </script>
<?php
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>