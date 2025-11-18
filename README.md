Saya Julia Rahmawati dengan NIM 2400742 mengerjakan TP 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

### Desain Program
Program ini berbasis PHP dengan arsitektur MVC(Model-View-Controller) yang mengimplementasi sederhana dari Sistem informasi manajemen dosen dan penelitian. program ini menyediakan CRUD (create, read, update, delete) untuk entitas Dosen(Lecturers) dan Penelitian(Research).

#### Desain Database
Database : tp_mvc25 adalah database yang di dalam nya terdapat dua tabel yaitu, lecturers, dan penelitian. 
[!gambar](Dokumentasi/TabelDatabase.png)

#### Struktur Direktori
[!gambar](Dokumentasi/strukturfolder.png)
1. controller/ logika kontrol, mengatur alur data
2. model/ logika interaksi dengan database
3. view/ tampilan HTML/PHP
4. config/ file konfigurasi
5. tp_mvc25.sql database
6. index.php
 
### Alur Program
1. Titik Masuk dan Inisialisasi
   aplikasi ini dimulai dengan tiga titik masuk utama yang mengarahkan ke controller yang berbeda-beda.
   - index.php : halaman utama ( tetapi di program aku langsung ke tampilan dosen tidak ada tampilan khusus Dashboardnya).
   - index.php?action=lecturer : mengakses manajemen data Dosen.
   - index.php?action=research : mengakses manajemen data penelitian.
  
2. Alur Dosen(Lecturers)
   Melihat Daftar Dosen
   - User mengakses halaman dosen
   - LecturerController->index() dipanggil.
   - Model Lecturers membuka koneksi dan memanggil getLecturers() untuk mengambil           semua data dosen dari database.
   - LecturerView merender (render($data)) daftar dosen ke halaman.
   
   Menambahkan Dosen
   1. User mengklik tombol "Add New Lecturer"
   2. LecturerController->add() di panggil.
   3. LecturerView menampilkan form create.
   4. User mengisi form dan mengirimkannya (submit).
   5. LecturerController->add() memproses data formulir
   6. Model Lecturers memanggil add($data) untuk menambhkan data baru ke database.
   7. User diarahkan kembali ke halam daftar dosen.

   Mengedit Dosen
   1. User mengkilk tombol "Edit" untuk dosen tertentu.
   2. LecturerController->edit() di panggil.
   3. Controller mengambil data dosen berdasrkan id dan LecturerView menampilkan form        edit yang sudah terisi dengan data yang sebelumnya.
   4. User memperbarui form dan mengirimkannya (submit).
   5. LecturerController->edit() memproses data form dan id.
   6. Model Lecturers memanggil update($id, $data) untuk memperbarui data di database.
   7. User di arahkan kembali ke halam dafatr dosen.

   Menghapus Dosen
   1. User mengklik tombol "Delete" untuk dosen.
   2. LecturerController-delete() dipanggil, mengambil id.
   3. Controller memanggil Model Lecturers (delete($id)) untuk mengahapus baris data         dari database.
   4. User diarahkan kembali ke halaman daftar dosen.
    
3. Alur Manajemen Penelitian (Research)
   Melihat Daftar Penelitian
   1. User mengakses halaman penelitian
   2. ResearchController->indec() dipanggil.
   3. Controller memanggil Model Research (getResearch()) dan Model           Lecturers(getLecturers()) untuk mengambil dan untuk di tampilkan.
   4. Controller menggabungkan data
   5. Researchviwe merender (render($data)) daftar penelitian (termasuk data dosen terkaitnya) ke halaman.
  
   Menambahkan Penelitian
   1. user mengklik tombol "Tambah penelitian"
   2. ResearchController->add() di panggil
   3. Controller memanggil Model Lectures (getLecturers()) untuk mengambil data semua dosen.
   4. Controller mengirimkan data dosen tersebut ke researchView, agar form dapat menampilkan daftar pilihan dosen.
   5. ResearchView menampilkan form
   6. user mengisi form dan mengirimkannya
   7. ResearchController->add() memproses data
   8. Model Rosearch memanggil add($data) untuk menambahlan data penelitian yg baru ke database
   9. User diarahkan kemabli ke halaman penelitian.
  
   Mengedit Penelitian
   1. User mengkilk tombol "Edit" untuk penelitian tertentu.
   2. ResearchController->edit() di panggil.
   3. Controller memanggil Model rsesearch (getResearchById($id)) untuk mengambil data penelitian lama. dan memanggil Model Lecturers (getlecturers()) untuk mengambil data semua dosen.
   4. Controller menggabungkan kedua data dan megirimkan ke ResearchView.
   5. ResearchView menampilkan form edit yang sudah terisi data penelitian lama. 
   6. User memperbarui form dan mengirimkannya (submit).
   7. ResearchController->edit() memproses data form dan id.
   8. Model Research memanggil update($id, $data) untuk memperbarui data di database.
   9. User di arahkan kembali ke halam dafatr penelitian.
  
   Menghapus Penelitian
   1. User mengklik tombol "Delete" untuk penelitian.
   2. ResearchController-delete() dipanggil, mengambil id.
   3. Controller memanggil Model Reseacrh (delete($id)) untuk mengahapus baris data         dari database.
   4. User diarahkan kembali ke halaman daftar dosen.

### Dokumentasi  
[Tonton Video Demo Proyek di sini](Dokumentasi/hasilprojek.mp4)
