<?php

class ResearchView {

    // Method yang dipanggil oleh Controller->index()
    public function render($data) {
        // Variabel $data akan tersedia saat kita include file view
        // Path ini relatif terhadap file yang memanggil method render, yaitu index.php di luar.
        // Jadi, kita panggil view/Lecturer/index.php
        include "view/Research/index.php"; 
    }
    
    // method untuk menampilkan form Add
    public function renderCreate($lecturers_data) {
        $data = $lecturers_data;
        include "view/Research/create.php";
    }
    
    // Method untuk menampilkan form edit
    public function renderEdit($data) {
        include "view/Research/edit.php";
    }
}
?>