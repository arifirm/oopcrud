<?php

include('Koneksi.php');

class Crud extends Koneksi
{
    function __construct()
    {
        parent::__construct();
    }

     public function read_data($apotik,$id,$id_value)
    {
        $query = "SELECT * FROM $apotik";
        if($id!=null)
        {
            $query .= "WHERE $id='" .$id_value. "'";
        }
        $hasil = $this->conn->query($query);
        if(!$hasil)
        {
            return "Terjadi kesalahan pada query";
        }
        $rows = array();
        while($row = $hasil->fetch_assoc())
        {
            $rows[] = $row; 
        }
        return $rows;
    }
    public function simpan($apotik,$data)
    {
        $columns = implode(", ", array_keys($data));
        $escaped_values = array_map('mysql_real_escape_string', array_values($data));
        foreach ($escaped_values as $idx=>$data) $escaped_values[$idx] = "'".$data."'";
        $values = implode(", ", $escaped_values);
        $query = "INSERT INTO $apotik ($columns) VALUES ($values)";

        $hasil = $this->conn->query($query);
        if($hasil)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function update($apotik,$data,$id,$id_value)
    {
        $query = "UPDATE $apotik SET";
        $query .= implode(',', $data);
        $query .= "WHERE $id='" .$id_value. "'";
        $hasil = $this->conn->query($query);
        if($hasil)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function delete($apotik, $id, $id_value)
    {
         $query = "DELETE FROM $apotik WHERE $id='" .$id_value. "'";
         $hasil = $this->conn->query($query);
         if($hasil)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}