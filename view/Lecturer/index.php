<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="bootstrap.min.css" rel="stylesheet"> 

  <title>Daftar Dosen</title>
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
      <a type="button" class="btn btn-primary" href="index.php?add=true">Add New</a>
    </div>
    
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>NIDN</th>
          <th>PHONE</th>
          <th>JOIN DATE</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        if (!empty($data)) {
            foreach ($data as $row) {
        ?>
            <tr>
                <th><?php echo $row['id']; ?></th>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['nidn']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['join_date']; ?></td>
                <td>
                   <a class='btn btn-success' href='index.php?edit=true&id=<?php echo $row['id']; ?>'>Edit</a>
                   <a class='btn btn-danger' href='index.php?hapus=<?php echo $row['id']; ?>' onclick="return confirm('Yakin hapus?')">Delete</a>
                </td>
            </tr>
        <?php
            }
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="bootstrap.bundle.min.js"></script>
</body>
</html>