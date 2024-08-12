<?php
// Koneksi Database untuk edit data member
$koneksi = new mysqli("localhost", "root", "", "db_perpus");

// Ambil ID dari query
$id = isset($_GET['id_anggota']) ? $_GET['id_anggota'] : '';

// Ambil data anggota berdasarkan ID
$sql = $koneksi->query("SELECT * FROM tb_anggota WHERE id_anggota = '$id'");
$data = $sql->fetch_assoc();
?>

<!-- HTML Edit Buku -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>
    <main class="container-fluid">
        <h3 class="fw-bold">Edit Data Anggota</h3>
        <hr>
        <!-- Form Edit Anggota Start -->
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Nama<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($data['nama'] ?? ''); ?>" placeholder="Masukkan Nama" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Jenis Kelamin<span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="Laki-Laki" <?php echo ($data['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Nomor Telepon<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="telepon" value="<?php echo htmlspecialchars($data['telepon'] ?? ''); ?>" inputmode="numeric" maxlength="15" oninput="this.value = this.value.replace(/[^0-9, +]/g, '')" placeholder="Masukkan Nomor Telepon" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>" value="<?php echo htmlspecialchars($data['nama'] ?? ''); ?>" placeholder="Masukkan Email" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class="mb-2">Alamat<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo htmlspecialchars($data['alamat'] ?? ''); ?>" placeholder="Masukkan Alamat" required>
                    </div>
                </div>
                <button class="btn btn-primary mt-2 me-3" type="submit" name="simpan" value="Simpan" style="width: 100px;">Submit</button>
                <button class="btn btn-danger mt-2" type="button" name="batal" value="Batal" onclick="window.location.href='?page=member'" style="width: 100px;">Cancel</button>
            </div>
        </form>
        <!-- Form Edit Anggota End -->
    </main>
</body>

</html>


<!-- Koneksi untuk edit form -->
<?php
if (isset($_POST['simpan'])) {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $telepon = isset($_POST['telepon']) ? $_POST['telepon'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';

    $sql = $koneksi->query("UPDATE tb_anggota SET nama='$nama', jenis_kelamin='$jenis_kelamin', telepon='$telepon', email='$email', alamat='$alamat' WHERE id_anggota='$id'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Tersimpan");
            window.location.href = "?page=member";
        </script>
<?php
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>