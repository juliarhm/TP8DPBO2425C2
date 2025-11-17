<?php
// File ini mendefinisikan Class yang akan dipanggil oleh Controller
class LecturerView {

    // Method yang dipanggil oleh Controller->index()
    public function render($data) {
        // Variabel $data akan tersedia saat kita include file view
        // Path ini relatif terhadap file yang memanggil method render, yaitu index.php di luar.
        // Jadi, kita panggil view/Lecturer/index.php
        include "view/Lecturer/index.php"; 
    }
    
    // Kamu bisa tambahkan method lain untuk view yang berbeda
    public function renderCreate() {
        include "view/Lecturer/create.php";
    }
    
    // Method untuk menampilkan form edit
    public function renderEdit($data) {
        include "view/Lecturer/edit.php";
    }
}
?>