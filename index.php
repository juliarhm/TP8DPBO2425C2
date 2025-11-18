<?php
// Include koneksi dan data terkait
include_once("model/DB.php");
include_once("connection.php");
include_once("model/Lecturers.php");
include_once("model/Research.php"); // Tambahkan Model Research
include_once("controller/LecturersController.php"); 
include_once("controller/ResearchController.php"); // Tambahkan Controller Research

// Tentukan aksi (action)
// Default action adalah 'lecturer' jika tidak ada parameter 'action' di URL
$action = isset($_GET['action']) ? $_GET['action'] : 'lecturer'; 

// Atur Routing (Lalu lintas URL)

if ($action == 'research') {
    // Controller untuk Research
    $controller = new ResearchController();

    // Logika Routing untuk RESEARCH
    if (isset($_POST['submit_research']) && isset($_POST['id'])) {
        // KONDISI POST UPDATE RESEARCH (Ada submit_research DAN ada ID)
        $controller->edit();
    } else if (isset($_POST['submit_research'])) {
        // KONDISI POST ADD RESEARCH (Ada submit_research TAPI tidak ada ID)
        $controller->add();
    } else if (isset($_GET['edit'])) {
        // KONDISI GET FORM EDIT RESEARCH
        $controller->edit();
    } else if (isset($_GET['add'])) {
        // KONDISI GET FORM ADD RESEARCH
        $controller->add();
    } else if (isset($_GET['hapus'])) {
        // KONDISI DELETE RESEARCH
        $controller->delete();
    } else {
        // KONDISI TAMPILKAN DAFTAR RESEARCH UTAMA
        $controller->index();
    }

} else {
    // Controller untuk Lecturers (Default)
    $controller = new LecturerController();
    
    // Logika Routing untuk LECTURERS
    
    // PENTING: Saya memperbaiki logika routing lama kamu yang salah
    // Asumsi tombol submit Lecturer bernama 'submit' (dari view/Lecturer/create.php)

    if (isset($_POST['submit']) && isset($_POST['id'])) {
        // KONDISI POST UPDATE LECTURER (Ada submit DAN ada ID)
        $controller->edit();
    } else if (isset($_POST['submit'])) {
        // KONDISI POST ADD LECTURER (Ada submit TAPI tidak ada ID)
        $controller->add();
    } else if (isset($_GET['edit'])) {
        // KONDISI GET FORM EDIT LECTURER
        $controller->edit();
    } else if (isset($_GET['add'])) {
        // KONDISI GET FORM ADD LECTURER
        $controller->add();
    } else if (isset($_GET['hapus'])) {
        // KONDISI DELETE LECTURER
        $controller->delete();
    } else {
        // KONDISI TAMPILKAN DAFTAR LECTURER UTAMA
        $controller->index();
    }
}
?>