<!-- Koneksi Database -->
<?php

$koneksi = new mysqli("localhost", "root", "", "db_perpus");

?>

<!-- Table Start -->
<div class="d-flex mb-3">
    <a href="?page=book&aksi=tambah" class="btn btn-success">Add Data</a>
    <input type="text" id="input-data" class="form-control ms-auto" onkeyup="validasi()" placeholder="Search" style="width: 200px;">
</div>
<table id="data-table" class="table table-striped table-hover" style="width:100%">
    <thead class="text-center align-middle">
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Jumlah Buku</th>
            <th>Tanggal Input</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $sql = $koneksi->query("SELECT * FROM tb_buku");
        while ($data = $sql->fetch_assoc()) {

        ?>

            <tr>
                <td><?php echo $data['id_buku']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['pengarang']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>
                <td><?php echo $data['tahun_terbit']; ?></td>
                <td><?php echo $data['jumlah_buku']; ?></td>
                <td><?php echo $data['tgl_input']; ?></td>
                <td>
                    <a href="?page=book&aksi=edit&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-warning">Edit</a>
                    <a href="?page=book&aksi=delete&id_buku='<?php echo $data['id_buku']; ?>'" class="btn btn-danger">Delete</a>
                </td>
            </tr>

        <?php } ?>

    </tbody>
</table>
<!-- Table End -->

<!-- Validation Search Javascript -->
<script>
function validasi() {
  // Membuat Variabel
  var input, filter, table, tr, td, i, j, txtValue;
  input = document.getElementById("input-data");
  filter = input.value.toUpperCase();
  table = document.getElementById("data-table");
  tr = table.getElementsByTagName("tr");

  // Mencari kecocokan data tabel
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none"; 
    td = tr[i].getElementsByTagName("td");
    for (j = 0; j < td.length; j++) {
      if (td[j]) {
        txtValue = td[j].textContent || td[j].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        }
      }
    }
  }
}
</script>
