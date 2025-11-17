<!DOCTYPE html>
<html>

<head>
  <title>Create</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Lecturers</a>
      <a class="navbar-brand" href="index.php">Research</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">?</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="col-lg-6 m-auto">

    <form method="post">
      <br><br>
      <div class="card">

        <div class="card-header bg-primary">
          <h1 class="text-white text-center"> Tambahkan Data Penelitian</h1>
        </div><br>

        <label> JUDUL PENELITIAN </label>
        <input type="text" name="judul_penelitian" class="form-control" required> <br>

        <label> BIDANG: </label>
        <input type="text" name="bidang" class="form-control" required> <br>

        <label> TAHUN: </label>
        <input type="text" name="tahun" class="form-control" required> <br>

        <label> DOSEN PENELITIAN: </label>
        <select name="id_lecturer" class="form-control" require>
          <option value="">--Pilih Dosen Peneliti--</option>
          <?php 
          if (!empty($data)) {
            foreach ($data as $lecturer) {
            ?>
            <option value="<?php echo $lecturer['id']; ?>">
              <?php echo $lecturer['name']; ?> (NIDN : <?php echo $lecturer['nidn']; ?>)
            </option>
            <?php
            }
          }
          ?>
        </select>
        <br>
        <button class="btn btn-success" type="submit" name="submit_research">Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

      </div>
    </form>
  </div>
</body>

</html>