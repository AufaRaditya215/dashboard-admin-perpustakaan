<!-- Delete data -->
<?php
    $koneksi = new mysqli("localhost", "root", "", "db_perpus");

    $id = $_GET['id_anggota'];
    $sql = $koneksi->query("DELETE FROM tb_anggota WHERE id_anggota = '$id'");
?>

<!-- Redirect -->
<script>
    alert("Data Anggota Berhasil Dihapus");
    window.location = "?page=member";
</script>