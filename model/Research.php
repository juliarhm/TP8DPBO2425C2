<?php

class Research extends DB
{
    function getResearch()
    {
       $query = "SELECT `p`.*, `l`.`name` AS lecturer_name, `l`.`nidn` AS lecturer_nidn
              FROM `penelitian` AS `p`
              JOIN `lecturers` AS `l` ON `p`.`id_lecturers` = `l`.`id`"; 
        return $this->execute($query);
    }

    function getResearchById($id) 
    {
        $query = "SELECT p.*, l.name AS lecturer_name, l.nidn AS lecturer_nidn
                  FROM penelitian p
                  JOIN lecturers l ON p.id_lecturers = l.id
                  WHERE p.id = '$id'"; // ID Penelitian
        return $this->execute($query);
    }

    function add($data)
    {
        $judul = $data['judul_penelitian'];
        $bidang = $data['bidang'];
        $tahun = $data['tahun'];
        
        $id_lecturer = $data['id_lecturer'];

        $query = "INSERT INTO `penelitian` (`judul_penelitian`, `bidang`, `tahun`, `id_lecturers`) VALUES ('$judul', '$bidang', '$tahun', '$id_lecturer')";
        
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM `penelitian` WHERE id = '$id'";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $judul = $data['judul_penelitian'];
        $bidang = $data['bidang'];
        $tahun = $data['tahun'];
        $id_lecturer = $data['id_lecturer'];  

        $query = "UPDATE `penelitian` SET 
                    judul_penelitian = '$judul', 
                    bidang = '$bidang', 
                    tahun = '$tahun', 
                    id_lecturers = '$id_lecturer' 
                  WHERE id = '$id'";
                  
        return $this->execute($query);
    }
}
