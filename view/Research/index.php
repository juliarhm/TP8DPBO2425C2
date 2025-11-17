<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="bootstrap.min.css" rel="stylesheet"> 

  <title>Daftar Penelitian</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?action=lecturer">Dosen</a>
      <a class="navbar-brand" href="index.php?action=research">Penelitian</a>
    </div>
  </nav>

  
  <div class="container my-4">
    <div class="col-1 my-3">
      <a type="button" class="btn btn-primary" href="index.php?action=research&add=true">Tambah Penelitian</a>
    </div>
    
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>JUDUL PENELITIAN</th>
          <th>BIDANG</th>
          <th>TAHUN</th>
          <th>DESEN PENELITI</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        if (!empty($data['penelitian'])) {
            foreach ($data['penelitian'] as $row) {
        ?>
            <tr>
                <th><?php echo $row['id']; ?></th>
                <td><?php echo $row['judul_penelitian']; ?></td>
                <td><?php echo $row['bidang']; ?></td>
                <td><?php echo $row['tahun']; ?></td>
                <td><?php echo $row['lecturer_name']; ?></td>
                <td>
                   <a class='btn btn-success' href='index.php?action=research&edit=true&id=<?php echo $row['id']; ?>'>Edit</a>
                   <a class='btn btn-danger' href='index.php?action=research&hapus=<?php echo $row['id']; ?>' onclick="return confirm('Yakin hapus penelitian ini?')">Delete</a>
                </td>
            </tr>
        <?php
            }
        } else {
          ?>
            <tr>
              <td colspan="6" class="text-center">Belum ada data penelitian.</td>
            </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="bootstrap.bundle.min.js"></script>
</body>
</html>