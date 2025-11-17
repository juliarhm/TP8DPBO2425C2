<?php
// Ambil data penelitian dan daftar dosen dari array $data yang dikirim Controller
$penelitian = $data['penelitian'];
$lecturers = $data['lecturers'];
?>

<!DOCTYPE html>
<html>

<head>
  <title>Ubah Penelitian</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?action=research">Research</a>
  </div>
  </nav>
  <div class="col-lg-6 m-auto">

    <form method="post">

      <br><br>
      <div class="card">

      <div class="card-header bg-warning">
        <h1 class="text-white text-center"> Update Penelitian </h1>
      </div><br>

        <input type="hidden" name="id" value="<?php echo $penelitian['id']; ?>" class="form-control"> <br>

      <label> JUDUL PENELITIAN: </label>
      <input type="text" name="judul_penelitian" value="<?php echo $penelitian['judul_penelitian']; ?>" class="form-control" required> <br>

      <label> BIDANG: </label>
      <input type="text" name="bidang" value="<?php echo $penelitian['bidang']; ?>" class="form-control" required> <br>

      <label> TAHUN: </label>
      <input type="number" name="tahun" value="<?php echo $penelitian['tahun']; ?>" class="form-control" required> <br>
        
            <label> DOSEN PENELITI (FK): </label>
      <select name="id_lecturer" class="form-control" required>
         <option value="">-- Pilih Dosen Peneliti --</option>
         <?php
            // Loop melalui daftar semua dosen
            if (!empty($lecturers)) { 
              foreach ($lecturers as $lecturer) {
                // Cek apakah ID Dosen saat ini sama dengan ID Dosen yang tersimpan di Penelitian
                $selected = ($lecturer['id'] == $penelitian['id_lecturer']) ? 'selected' : '';
            ?>
              <option value="<?php echo $lecturer['id']; ?>" <?php echo $selected; ?>>
                <?php echo $lecturer['name']; ?> (NIDN: <?php echo $lecturer['nidn']; ?>)
              </option>
            <?php
                }
            }
            ?>
          </select>
          <br>

            <button class="btn btn-success" type="submit" name="submit_research"> Update Penelitian </button><br>
          <a class="btn btn-info" href="index.php?action=research"> Cancel </a><br>

        </div>
      </form>
    </div>
</body>

</html>