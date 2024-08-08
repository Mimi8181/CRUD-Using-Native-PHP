<?php
if (isset($_POST["update"])) {
  $id = $_POST["id"];
  $nama = $_POST["nama"];
  $alamat = $_POST["alamat"];
  $kelas = $_POST["telepon"];
  $email = $_POST["email"];
  $web = $_POST["web"];
  $pendidikan = $_POST["pendidikan"];
  $pengalaman_kerja = $_POST["pengalaman_kerja"];
  $keterampilan = $_POST["keterampilan"];
  $foto_path = $_POST["foto_path"];


  //gunakan file config.php
  include_once("config.php");

  //update data menggunakan query
  $result = mysqli_query($conn, "UPDATE CV 
                        SET nama='$nama',
                        alamat='$alamat', 
                        telepon='$telepon', 
                        email='$email',
                        web='$web', 
                        pendidikan='$pendidikan', 
                        pengalaman_kerja='$pengalaman_kerja', 
                        keterampilan='$keterampilan', 
                        foto_path='$foto_path', 
                        WHERE id=$id");

  //redirect ke halaman index
  header("Location: index.php");
}
?>

<?php
$id = $_GET['id'];

//gunakan file config.php
include_once("config.php");

//ambil data dan simpan kedalam variabel result
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");

//masukan result ke variabel masing-masing
while ($row = mysqli_fetch_array($result)) {
  $nama = $row["nama"];
  $alamat = $row["alamat"];
  $kelas = $row["telepon"];
  $email = $row["email"];
  $web = $row["web"];
  $pendidikan = $row["pendidikan"];
  $pengalaman_kerja = $row["pengalaman_kerja"];
  $keterampilan = $row["keterampilan"];
  $foto_path = $row["foto_path"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <title>CRUD PHP | Add</title>
</head>

<body class="p-3">
  <a class="btn btn-success" href="index.php">Kembali ke Index</a>

  <form action="edit.php" method="post">
    <table class="table table-striped">
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" value=<?php echo $nama ?>></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><input type="text" name="alamat" value=<?php echo $kelas ?>></td>
      </tr>
      <tr>
        <td>Telephone</td>
        <td><input type="text" name="Telepon" value=<?php echo $email ?>></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" name="email" value=<?php echo $email ?>></td>
      </tr>
      <tr>
        <td>Web</td>
        <td><input type="text" name="web" value=<?php echo $email ?>></td>
      </tr>
      <tr>
        <td>Pendidikan</td>
        <td><input type="text" name="pendidikan" value=<?php echo $email ?>></td>
      </tr>
      <tr>
        <td>Pengalaman Kerja</td>
        <td><input type="text" name="pengalaman_kerja" value=<?php echo $email ?>></td>
      </tr>
      <tr>
        <td>Keterampilan</td>
        <td><input type="text" name="keterampilan" value=<?php echo $email ?>></td>
      </tr>
      <tr>
        <td>Foto Path</td>
        <td><input type="text" name="foto_path" value=<?php echo $email ?>></td>
      </tr>
      <tr>
        <td><input type="hidden" name="id" value=<?php echo $_GET['id'] ?>></td>
        <td><button class="btn btn-success" type="submit" name="update">Update</button></td>
      </tr>
    </table>
  </form>

</body>

</html>
