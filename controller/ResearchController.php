<?php
include_once("connection.php");
include_once("model/Research.php");
include_once("model/Lecturers.php");
include_once("view/ResearchView.php");

class ResearchController
{
  // Properti kontroller
  private $research;
  private $lecturer;

  // Konstruktor Controller research
  function __construct()
  {
    $this->research = new Research(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    $this->lecturer = new Lecturers(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  // Method yang mengarahkan ke halaman umum controller research
  public function index()
  {
    // Menyambungkan/membuka jalur ke database
    $this->research->open();
    $this->lecturer->open();

    // Meneruskan request umum dari views (mengambil data research) 
    $this->research->getResearch();
    $this->lecturer->getLecturers();

    // Inisiasi variabel untuk menyimpan data research
    $data = array(
        'penelitian' => array(),
        'lecturers' => array()
    );

    // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
    while ($row = $this->research->getResult()) {
      array_push($data['penelitian'], $row);
    }
    while ($row = $this->lecturer->getResult()) {
      array_push($data['lecturers'], $row);
    }

    // Menutup jalur ke database
    $this->research->close();
    $this->lecturer->close();

    // Meneruskannya ke view
    $view = new researchView();
    $view->render($data);
  }

  function add()
  {
    if (isset($_POST['submit_research'])) {

      $data = array(
        'judul_penelitian' => $_POST['judul_penelitian'],
        'bidang' => $_POST['bidang'],
        'tahun' => $_POST['tahun'],
        'id_lecturer' => $_POST['id_lecturer']
      );
      $this->research->open();
      $this->research->add($data);
      $this->research->close();

      header("location:index.php?action=research");
    }else {
        $this->lecturer->open();
        $this->lecturer->getLecturers();
        $lecturers_data = array();
        while ($row = $this->lecturer->getResult()) {
            array_push($lecturers_data, $row);
        }
        $this->lecturer->close();
        // Jika belum submit, tampilkan form (View)
        $view = new ResearchView();
        $view->renderCreate($lecturers_data); //kiirm data ke lecturer
    }
  }

    function edit()
    {
        if (isset($_POST['submit_research'])) { 
            $id = $_POST['id'];
            $data = array(
            'judul_penelitian' => $_POST['judul_penelitian'],
            'bidang' => $_POST['bidang'],
            'tahun' => $_POST['tahun'],
            'id_lecturer' => $_POST['id_lecturer'] // Foreign Key
        );

        $this->research->open();
        $this->research->update($id, $data); 
        $this->research->close();

        header("location:index.php?action=research");
      
        }else{
            $id = $_GET['id'];
            $this->research->open();
            $this->research->getResearchById($id); 
            $data_research = $this->research->getResult(); 
            $this->research->close();

      
            $this->lecturer->open();
            $this->lecturer->getLecturers();
            $lecturers_data = array();
            while ($row = $this->lecturer->getResult()) {
                array_push($lecturers_data, $row);
            }
            $this->lecturer->close();

            // Gabungkan data untuk dikirim ke View
            $data = array(
                'penelitian' => $data_research,
                'lecturers' => $lecturers_data
            );

            $view = new ResearchView();
            $view->renderEdit($data);
        }
    }

    function delete()
    {
        $id = $_GET['hapus'];
        if (!empty($id)) {
            $this->research->open();
            $this->research->delete($id); 
            $this->research->close();
        }
        header("location:index.php?action=research"); // PERBAIKAN 7: Redirect ke Research
    }
}
