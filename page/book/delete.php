<!-- Delete data -->
<?php
    $koneksi = new mysqli("localhost", "root", "", "db_perpus");

    $id = $_GET['id_buku'];
    $sql = $koneksi->query("DELETE FROM tb_buku WHERE id_buku = '$id'");
?>

<!-- Redirect -->
<script>
    alert("Data Buku Berhasil Dihapus");
    window.location = "?page=book";
</script>