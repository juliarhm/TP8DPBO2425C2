<?php
include_once("connection.php");
include_once("model/Lecturers.php");
include_once("view/LecturerView.php");

class LecturerController
{
  // Properti kontroller
  private $lecturer;

  // Konstruktor Controller lecturer
  function __construct()
  {
    $this->lecturer = new Lecturers(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  // Method yang mengarahkan ke halaman umum controller lecturer
  public function index()
  {
    // Menyambungkan/membuka jalur ke database
    $this->lecturer->open();

    // Meneruskan request umum dari views (mengambil data lecturer) 
    $this->lecturer->getlecturers();

    // Inisiasi variabel untuk menyimpan data lecturer
    $data = array();

    // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
    while ($row = $this->lecturer->getResult()) {
      array_push($data, $row);
    }

    // Menutup jalur ke database
    $this->lecturer->close();

    // Meneruskannya ke view
    $view = new LecturerView();
    $view->render($data);
  }

  function add()
  {
    if (isset($_POST['submit'])) {

      $data = array(
        'name' => $_POST['name'],
        'nidn' => $_POST['nidn'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date']
      );
      $this->lecturer->open();
      $this->lecturer->add($data);
      $this->lecturer->close();

      header("location:index.php");
    }else {
        // Jika belum submit, tampilkan form (View)
        $view = new LecturerView();
        $view->renderCreate(); // Method ini akan memuat view/Lecturer/create.php
    }
  }

  function edit()
  {
    if (isset($_POST['submit'])) {
      $id = $_POST['id'];
      $data = array(
        'name' => $_POST['name'],
        'nidn' => $_POST['nidn'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date']
      );

      $this->lecturer->open();
      $this->lecturer->update($id, $data); 
      $this->lecturer->close();

      header("location:index.php");
    }else {
      $id = $_GET['id'];
      $this->lecturer->open();
      $this->lecturer->getLecturerById($id); // memanggil fungsi getById di model
            
      $data = $this->lecturer->getResult(); 
      $this->lecturer->close();

      $view = new LecturerView();
      $view->renderEdit($data);
    }
  }

  function delete()
  {
    $id = $_GET['hapus'];
    if (!empty($id)) {
        $this->lecturer->open();
        $this->lecturer->delete($id); 
        $this->lecturer->close();
    }
    header("location:index.php");
  }
}
