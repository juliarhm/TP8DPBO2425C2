<?php

class Lecturers extends DB
{
    // mengambil semua data dosen
    function getLecturers()
    {
        $query = "SELECT * FROM lecturers";
        return $this->execute($query);
    }

    function getLecturerById($id) 
    {
        $query = "SELECT * FROM lecturers WHERE id = '$id'";
        return $this->execute($query);
    }

    // menambahkan data
    function add($data)
    {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $query = " INSERT INTO `lecturers`(`name`, `nidn`, `phone`, `join_date`) VALUES ( '$name', '$nidn', '$phone', '$join_date' )";

        return $this->execute($query);
    }

    // menghapus data
    function delete($id)
    {
        $query = "DELETE from `lecturers` where id= '$id'";
        return $this->execute($query);
    }

    // update data
    function update($id, $data)
    {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $query = " UPDATE `lecturers` SET name ='$name', nidn ='$nidn', phone ='$phone', join_date ='$join_date' WHERE id = '$id'";

        return $this->execute($query);
    }
}
